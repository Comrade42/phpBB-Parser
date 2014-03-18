<?php

namespace Comrade42\PhpBBParser\Command;

use Goutte\Client;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class ParseUsersCommand
 * @package Comrade42\PhpBBParser\Command
 */
class ParseUsersCommand extends ContainerAwareCommand
{
    const USERS_PER_PAGE = 50;

    protected function configure()
    {
        $this->setName('parse:users')->setDescription('Parse users');
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
        $baseUrl = rtrim($this->container->getParameter('forum_url'), '/');
        $offset = 0;

        do
        {
            $url = $baseUrl . '/memberlist?mode=joined&start=' . $offset;
            $output->write("<info>⇒ HTTP GET: {$url}</info>\t");

            $crawler = $client->request('GET', $url);

            $status = $client->getInternalResponse()->getStatus();
            $output->writeln("<info>[{$status}]</info>");

            if ($status != 200) break;

            $crawler->filter('#memberlist tbody tr')->each(
                function (Crawler $node) use ($output, $entityManager, $entityBridge, $dialogHelper)
                {
                    $columns = $node->children();
                    $id = substr($columns->eq(1)->filter('a')->attr('href'), 2);
                    $nickname = substr($columns->eq(1)->text(), 2);

                    $entity = $entityBridge->getMemberEntity($entityManager, $id);
                    $memberName = $entityBridge->getMemberNickname($entity);

                    if (!empty($memberName) && $memberName != $nickname && !$dialogHelper->askConfirmation(
                            $output,
                            "<question>Member name doesn't match for #{$id} ({$memberName} → {$nickname}). Update entity? [Y/n]:</question> "
                        ))
                    {
                        return;
                    }

                    $regDate = \DateTime::createFromFormat('Y-m-d H:i:s', $columns->eq(3)->text() . ' 00:00:00');
                    $avatarUrl = $columns->eq(1)->filter('a img')->attr('src');

                    $entityBridge->fillMemberEntity($entity, $nickname, $regDate, $avatarUrl);
                    $entityManager->persist($entity);
                }
            );

            $entityManager->flush();
            $offset += static::USERS_PER_PAGE;

            if ($crawler->count() < static::USERS_PER_PAGE) break;
        }
        while (true);
    }
}
