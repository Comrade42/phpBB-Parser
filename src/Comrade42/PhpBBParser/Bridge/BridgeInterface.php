<?php

namespace Comrade42\PhpBBParser\Bridge;

use Comrade42\PhpBBParser\Entity\EntityInterface;
use Comrade42\PhpBBParser\Entity\ForumInterface;
use Comrade42\PhpBBParser\Entity\MemberInterface;
use Comrade42\PhpBBParser\Entity\PostInterface;
use Comrade42\PhpBBParser\Entity\TopicInterface;
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
     * @return MemberInterface
     */
    public function getMemberEntity(EntityManager $entityManager, $entityId = null);

    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return EntityInterface
     */
    public function getCategoryEntity(EntityManager $entityManager, $entityId = null);

    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return EntityInterface
     */
    public function getForumEntity(EntityManager $entityManager, $entityId = null);

    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return TopicInterface
     */
    public function getTopicEntity(EntityManager $entityManager, $entityId = null);

    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return PostInterface
     */
    public function getPostEntity(EntityManager $entityManager, $entityId = null);

    /**
     * @param EntityManager $entityManager
     * @return ForumInterface[]
     */
    public function getForumList(EntityManager $entityManager);

    /**
     * @param EntityInterface $entity
     * @param string $name
     * @param int $order
     */
    public function fillCategoryEntity(EntityInterface $entity, $name, $order);

    /**
     * @param EntityInterface $entity
     * @param int $categoryId
     * @param string $title
     * @param string $description
     * @param int $order
     */
    public function fillForumEntity(EntityInterface $entity, $categoryId, $title, $description, $order);

    /**
     * @param EntityInterface $entity
     * @return string
     */
    public function getCategoryName(EntityInterface $entity);

    /**
     * @param EntityInterface $entity
     * @return string
     */
    public function getForumTitle(EntityInterface $entity);
}
