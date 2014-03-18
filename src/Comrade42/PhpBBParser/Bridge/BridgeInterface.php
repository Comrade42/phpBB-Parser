<?php

namespace Comrade42\PhpBBParser\Bridge;

use Comrade42\PhpBBParser\Entity\EntityInterface;
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
     * @return EntityInterface
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
     * @param EntityInterface $entity
     * @param string $nickname
     * @param \DateTime $regDate
     * @param string $avatarUrl
     */
    public function fillMemberEntity(EntityInterface $entity, $nickname, \DateTime $regDate, $avatarUrl);

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
    public function getMemberNickname(EntityInterface $entity);

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
