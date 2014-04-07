<?php

namespace Comrade42\PhpBBParser\Command;

use Comrade42\PhpBBParser\Helper\BBCodes\PCREParser;
use Goutte\Client;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class ParseTopicsCommand
 * @package Comrade42\PhpBBParser\Command
 */
class ParseTopicsCommand extends ContainerAwareCommand
{
    const TOPICS_PER_PAGE   = 50;
    const POSTS_PER_PAGE    = 15;

    protected function configure()
    {
        $this->setName('parse:topics')->setDescription('Parse topics');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var \Symfony\Component\Console\Helper\DialogHelper $dialog */
        $dialog = $this->getHelperSet()->get('dialog');
        /** @var \Doctrine\ORM\EntityManager $entityManager */
        $entityManager = $this->container->get('doctrine');
        /** @var \Comrade42\PhpBBParser\Bridge\BridgeInterface $entityBridge */
        $entityBridge = $this->container->get('bridge');

        $choices = array();
        foreach ($entityBridge->getForumList($entityManager) as $forum)
        {
            $choices[$forum->getId()] = $forum->getTitle();
        }

        ksort($choices);
        $forumId = $dialog->select($output, 'Please select forum for parsing:', $choices);

        $client = new Client();
        $client->getCookieJar()->set(new Cookie(
            $this->container->getParameter('fa_sid_cookie_name'),
            $this->container->getParameter('fa_sid_cookie_value')
        ));

        $baseUrl = rtrim($this->container->getParameter('forum_url'), '/');

        for ($offset = 0; ; $offset += static::TOPICS_PER_PAGE)
        {
            $url = "{$baseUrl}/f{$forumId}p{$offset}-forum";
            $output->write(str_pad("<info>⇒ HTTP GET: {$url}</info> ", 80));

            $crawler = $client->request('GET', $url);

            $status = $client->getInternalResponse()->getStatus();
            $output->writeln("<info>[{$status}]</info>");

            if ($status != 200)
            {
                $offset -= static::TOPICS_PER_PAGE;
                sleep(1);
                continue;
            }

            $crawler = $crawler->filter('#main-content ul.topics li.row');
            $crawler->each(function (Crawler $node, $index) use ($output, $entityManager, $entityBridge, $client, $baseUrl, $forumId)
            {
                $link = $node->filter('dd.dterm a.topictitle');
                $topicId = intval(substr($link->attr('href'), 2, -6));
                $title = $link->text();

                $link = $node->filter('dd.dterm span.span-tab a');
                if ($link->count() == 1) $authorId = intval(substr($link->attr('href'), 2));
                else $authorId = 0;

                preg_match("/background-image:url\('(.+)'\);/iU", $node->filter('dl.icon')->attr('style'), $matches);
                $matches = explode('/', $matches[1]);
                $icon = end($matches);

                switch ($icon)
                {
                    case 'topic_unread_locked.gif':
                    case 'topic_read_locked.gif':
                        $isSticky = false;
                        $isLocked = true;
                        break;

                    case 'announce_read.gif':
                    case 'folder_announce.gif':
                    case 'sticky_read.gif':
                        $isSticky = true;
                        $isLocked = false;
                        break;

                    default:
                        $isSticky = false;
                        $isLocked = false;
                }

                $links = $node->filter('dd.lastpost a');
                if ($links->count() == 2) {
                    $memberUpdatedId = intval(substr($links->first()->attr('href'), 2));
                    $lastMessageHref = $links->last()->attr('href');
                } else {
                    $memberUpdatedId = 0;
                    $lastMessageHref = $links->first()->attr('href');
                }

                $topic = $entityBridge->getTopicEntity($entityManager, $topicId);
                $topic->setForumId($forumId)
                    ->setMemberStartedId($authorId)
                    ->setMemberUpdatedId($memberUpdatedId)
                    ->setLastMessageId(intval(substr($lastMessageHref, strrpos($lastMessageHref, '#') + 1)))
                    ->setTitle($title)
                    ->setIsSticky($isSticky)
                    ->setIsLocked($isLocked)
                    ->setRepliesNumber(intval($node->filter('dd.posts')->text()))
                    ->setViewsNumber(intval($node->filter('dd.views')->text()))
                    ->setOrder($index + 1);

                for ($offset = 0; ; $offset += ParseTopicsCommand::POSTS_PER_PAGE)
                {
                    $url = "{$baseUrl}/t{$topicId}p{$offset}-topic";
                    $output->write(str_pad("<info>⇒ HTTP GET: {$url}</info> ", 80));

                    $crawler = $client->request('GET', $url);

                    $status = $client->getInternalResponse()->getStatus();
                    $output->writeln("<info>[{$status}]</info>");

                    if ($status != 200)
                    {
                        $offset -= ParseTopicsCommand::POSTS_PER_PAGE;
                        sleep(1);
                        continue;
                    }

                    /** @var \Symfony\Component\DomCrawler\Crawler $crawler */
                    $crawler = $crawler->filter('#main-content div.post')->reduce(function (Crawler $node)
                    {
                        return is_numeric(substr($node->attr('id'), 1));
                    });

                    if ($offset == 0)
                    {
                        $topic->setFirstMessageId(intval(substr($crawler->first()->attr('id'), 1)));
                        $entityManager->persist($topic);
                    }

                    $crawler->each(function (Crawler $node) use ($output, $entityManager, $entityBridge, $forumId, $topicId)
                    {
                        $postId = substr($node->attr('id'), 1);

                        $contentRaw = $node->filter('div.postbody div.content div')->html();
                        $contentParsed = trim(PCREParser::parseAll($contentRaw));
                        $contentClean = strip_tags($contentParsed);

                        if ($contentClean != $contentParsed) {
                            $output->writeln("\t- parsing problems with post #{$postId}");
                        }

                        $link = $node->filter('div.postbody p.author a');
                        $authorId = intval(substr($link->attr('href'), 2));
                        $authorName = trim($link->text());

                        $text = trim($node->filter('div.postbody p.author')->text(), " \t\n\r\0\x0B\xC2\xA0");
                        $text = str_replace($authorName . ' в ', '', $text);
                        $dateTime = new \DateTime($text);

                        $post = $entityBridge->getPostEntity($entityManager, $postId);
                        $post->setForumId($forumId)
                            ->setTopicId($topicId)
                            ->setAuthorId($authorId)
                            ->setAuthorName($authorName)
                            ->setCreateDate($dateTime)
                            ->setSubject(trim($node->filter('div.postbody h2.topic-title')->text()))
                            ->setContent($contentParsed);

                        $entityManager->persist($post);
                    });

                    if ($crawler->count() < ParseTopicsCommand::POSTS_PER_PAGE) break;
                }

                $entityManager->flush();
            });

            if ($crawler->count() < static::TOPICS_PER_PAGE) break;
        }
    }
}
