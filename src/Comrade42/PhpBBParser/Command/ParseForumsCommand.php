<?php

namespace Comrade42\PhpBBParser\Command;

use Goutte\Client;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class ParseForumsCommand
 * @package Comrade42\PhpBBParser\Command
 */
class ParseForumsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('parse:forums')->setDescription('Parse forums');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var \Doctrine\ORM\EntityManager $entityManager */
        $entityManager = $this->container->get('doctrine');
        /** @var \Comrade42\PhpBBParser\Bridge\BridgeInterface $entityBridge */
        $entityBridge = $this->container->get('bridge');
        /** @var \Symfony\Component\Console\Helper\DialogHelper $dialogHelper */
        $dialogHelper = $this->getHelperSet()->get('dialog');

        $client = new Client();
        $client->getCookieJar()->set(new Cookie(
            $this->container->getParameter('fa_sid_cookie_name'),
            $this->container->getParameter('fa_sid_cookie_value')
        ));

        $url = rtrim($this->container->getParameter('forum_url'), '/') . '/forum';
        $output->write("<info>⇒ HTTP GET: {$url}</info>\t");

        $crawler = $client->request('GET', $url);

        $status = $client->getInternalResponse()->getStatus();
        $output->writeln("<info>[{$status}]</info>");

        if ($status != 200) return;

        $crawler->filter('#main-content div.forabg')->each(
            function (Crawler $node, $index) use ($output, $entityManager, $entityBridge, $dialogHelper)
            {
                $categoryId = $index + 1;
                $parsedName = $node->filter('ul.topiclist li.header dd.dterm h2')->text();

                $entity = $entityBridge->getCategoryEntity($entityManager, $categoryId);
                $categoryName = $entityBridge->getCategoryName($entity);

                if (!empty($categoryName) && $categoryName != $parsedName && !$dialogHelper->askConfirmation(
                        $output,
                        "<question>Category name doesn't match for #{$categoryId} ({$categoryName} → {$parsedName}). Update category? [Y/n]:</question> "
                    ))
                {
                    return;
                }

                $entityBridge->fillCategoryEntity($entity, $parsedName, $index);
                $entityManager->persist($entity);

                $node->filter('ul.forums li.row dd.dterm')->each(
                    function (Crawler $node, $index) use ($output, $entityManager, $entityBridge, $dialogHelper, $categoryId)
                    {
                        $link = $node->filter('a.forumtitle');
                        $forumId = substr($link->attr('href'), 2, -6);
                        $parsedTitle = $link->text();
                        $description = trim(substr($node->text(), strlen($parsedTitle)));

                        $entity = $entityBridge->getForumEntity($entityManager, $forumId);
                        $forumTitle = $entityBridge->getForumTitle($entity);

                        if (!empty($forumTitle) && $forumTitle != $parsedTitle && !$dialogHelper->askConfirmation(
                                $output,
                                "<question>Forum name doesn't match for #{$forumId} ({$forumTitle} → {$parsedTitle}). Update forum? [Y/n]:</question> "
                            ))
                        {
                            return;
                        }

                        $entityBridge->fillForumEntity($entity, $categoryId, $parsedTitle, $description, $index);
                        $entityManager->persist($entity);
                    }
                );
            }
        );

        $entityManager->flush();
    }
}
