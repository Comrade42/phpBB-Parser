<?php

namespace Comrade42\PhpBBParser\Bridge;

use Doctrine\ORM\EntityManager;

/**
 * Interface BridgeInterface
 * @package Comrade42\PhpBBParser\Bridge
 */
interface BridgeInterface
{
    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return \Comrade42\PhpBBParser\Entity\MemberInterface
     */
    public function getMemberEntity(EntityManager $entityManager, $entityId = null);

    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return \Comrade42\PhpBBParser\Entity\CategoryInterface
     */
    public function getCategoryEntity(EntityManager $entityManager, $entityId = null);

    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return \Comrade42\PhpBBParser\Entity\ForumInterface
     */
    public function getForumEntity(EntityManager $entityManager, $entityId = null);

    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return \Comrade42\PhpBBParser\Entity\TopicInterface
     */
    public function getTopicEntity(EntityManager $entityManager, $entityId = null);

    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return \Comrade42\PhpBBParser\Entity\PostInterface
     */
    public function getPostEntity(EntityManager $entityManager, $entityId = null);

    /**
     * @param EntityManager $entityManager
     * @return \Comrade42\PhpBBParser\Entity\ForumInterface[]
     */
    public function getForumList(EntityManager $entityManager);
}
