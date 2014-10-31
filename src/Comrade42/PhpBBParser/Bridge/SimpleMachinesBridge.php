<?php

namespace Comrade42\PhpBBParser\Bridge;

use Comrade42\PhpBBParser\Entity\EntityInterface;
use Comrade42\PhpBBParser\Entity\SimpleMachines\BoardEntity;
use Comrade42\PhpBBParser\Entity\SimpleMachines\CategoryEntity;
use Comrade42\PhpBBParser\Entity\SimpleMachines\MemberEntity;
use Comrade42\PhpBBParser\Entity\SimpleMachines\MessageEntity;
use Comrade42\PhpBBParser\Entity\SimpleMachines\TopicEntity;
use Doctrine\ORM\EntityManager;

/**
 * Class SimpleMachinesBridge
 * @package Comrade42\PhpBBParser\Bridge
 */
class SimpleMachinesBridge implements BridgeInterface
{
    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return MemberEntity
     */
    public function getMemberEntity(EntityManager $entityManager, $entityId = null)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\MemberEntity $entity */
        $entity = $entityManager->find('Comrade42\PhpBBParser\Entity\SimpleMachines\MemberEntity', $entityId);

        if (empty($entity)) {
            $entity = new MemberEntity();
            $entity->setId($entityId);
        }

        return $entity;
    }

    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return CategoryEntity
     */
    public function getCategoryEntity(EntityManager $entityManager, $entityId = null)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\CategoryEntity $entity */
        $entity = $entityManager->find('Comrade42\PhpBBParser\Entity\SimpleMachines\CategoryEntity', $entityId);

        if (empty($entity)) {
            $entity = new CategoryEntity();
            $entity->idCat = $entityId;
        }

        return $entity;
    }

    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return BoardEntity
     */
    public function getForumEntity(EntityManager $entityManager, $entityId = null)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\BoardEntity $entity */
        $entity = $entityManager->find('Comrade42\PhpBBParser\Entity\SimpleMachines\BoardEntity', $entityId);

        if (empty($entity)) {
            $entity = new BoardEntity();
            $entity->idBoard = $entityId;
        }

        return $entity;
    }

    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return TopicEntity
     */
    public function getTopicEntity(EntityManager $entityManager, $entityId = null)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\TopicEntity $entity */
        $entity = $entityManager->find('Comrade42\PhpBBParser\Entity\SimpleMachines\TopicEntity', $entityId);

        if (empty($entity)) {
            $entity = new TopicEntity();
            $entity->setId($entityId);
        }

        return $entity;
    }

    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return MessageEntity
     */
    public function getPostEntity(EntityManager $entityManager, $entityId = null)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\MessageEntity $entity */
        $entity = $entityManager->find('Comrade42\PhpBBParser\Entity\SimpleMachines\MessageEntity', $entityId);

        if (empty($entity)) {
            $entity = new MessageEntity();
            $entity->setId($entityId);
        }

        return $entity;
    }

    /**
     * @param EntityManager $entityManager
     * @return BoardEntity[]
     */
    public function getForumList(EntityManager $entityManager)
    {
        return $entityManager->getRepository('Comrade42\PhpBBParser\Entity\SimpleMachines\BoardEntity')->findAll();
    }

    /**
     * @param EntityInterface $entity
     * @param string $expectedClass
     * @throws \InvalidArgumentException
     */
    protected function validateEntityClass(EntityInterface $entity, $expectedClass)
    {
        if (!$entity instanceof $expectedClass) {
            $actualClass = get_class($entity);
            throw new \InvalidArgumentException(
                "Wrong entity '{$actualClass}' specified! Instance of '{$expectedClass}' expected."
            );
        }
    }
}
