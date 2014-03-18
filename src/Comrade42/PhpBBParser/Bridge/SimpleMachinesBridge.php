<?php

namespace Comrade42\PhpBBParser\Bridge;

use Comrade42\PhpBBParser\Entity\EntityInterface;
use Comrade42\PhpBBParser\Entity\SimpleMachines\BoardEntity;
use Comrade42\PhpBBParser\Entity\SimpleMachines\CategoryEntity;
use Comrade42\PhpBBParser\Entity\SimpleMachines\MemberEntity;
use Doctrine\ORM\EntityManager;

/**
 * Class SimpleMachinesBridge
 * @package Comrade42\PhpBBParser\Bridge
 */
class SimpleMachinesBridge implements BridgeInterface
{
    const DEFAULT_PASSWORD = '1q2w3e4r';

    /**
     * @param EntityManager $entityManager
     * @param int|null $entityId
     * @return MemberEntity
     */
    public function getMemberEntity(EntityManager $entityManager, $entityId = null)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\MemberEntity $entity */
        $entity = $entityManager->find('Comrade42\PhpBBParser\Entity\SimpleMachines\MemberEntity', $entityId);

        if (empty($entity))
        {
            $entity = new MemberEntity();
            $entity->idMember = $entityId;
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

        if (empty($entity))
        {
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

        if (empty($entity))
        {
            $entity = new BoardEntity();
            $entity->idBoard = $entityId;
        }

        return $entity;
    }

    /**
     * @param EntityInterface $entity
     * @param string $nickname
     * @param \DateTime $regDate
     * @param string $avatarUrl
     */
    public function fillMemberEntity(EntityInterface $entity, $nickname, \DateTime $regDate, $avatarUrl)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\MemberEntity $entity */
        $this->validateEntityClass($entity, 'Comrade42\PhpBBParser\Entity\SimpleMachines\MemberEntity');

        $entity->memberName     = $nickname;
        $entity->dateRegistered = $regDate->getTimestamp();
        $entity->realName       = $nickname;
        $entity->passwd         = sha1(strtolower($entity->memberName) . static::DEFAULT_PASSWORD);
        $entity->emailAddress   = uniqid() . '@mailforspam.com';
        $entity->hideEmail      = 1;
        $entity->avatar         = $avatarUrl;
        $entity->idPostGroup    = 4;
        $entity->passwordSalt   = substr(md5(mt_rand()), 0, 4);
    }

    /**
     * @param EntityInterface $entity
     * @param string $name
     * @param int $order
     */
    public function fillCategoryEntity(EntityInterface $entity, $name, $order)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\CategoryEntity $entity */
        $this->validateEntityClass($entity, 'Comrade42\PhpBBParser\Entity\SimpleMachines\CategoryEntity');

        $entity->name       = $name;
        $entity->catOrder   = $order;
    }

    /**
     * @param EntityInterface $entity
     * @param int $categoryId
     * @param string $title
     * @param string $description
     * @param int $order
     */
    public function fillForumEntity(EntityInterface $entity, $categoryId, $title, $description, $order)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\BoardEntity $entity */
        $this->validateEntityClass($entity, 'Comrade42\PhpBBParser\Entity\SimpleMachines\BoardEntity');

        $entity->idCat          = $categoryId;
        $entity->name           = $title;
        $entity->description    = $description;
        $entity->boardOrder     = $order;
    }

    /**
     * @param EntityInterface $entity
     * @return string
     */
    public function getMemberNickname(EntityInterface $entity)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\MemberEntity $entity */
        $this->validateEntityClass($entity, 'Comrade42\PhpBBParser\Entity\SimpleMachines\MemberEntity');

        return $entity->memberName;
    }

    /**
     * @param EntityInterface $entity
     * @return string
     */
    public function getCategoryName(EntityInterface $entity)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\CategoryEntity $entity */
        $this->validateEntityClass($entity, 'Comrade42\PhpBBParser\Entity\SimpleMachines\CategoryEntity');

        return $entity->name;
    }

    /**
     * @param EntityInterface $entity
     * @return string
     */
    public function getForumTitle(EntityInterface $entity)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\BoardEntity $entity */
        $this->validateEntityClass($entity, 'Comrade42\PhpBBParser\Entity\SimpleMachines\BoardEntity');

        return $entity->name;
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
            throw new \InvalidArgumentException("Wrong entity '{$actualClass}' specified! Instance of '{$expectedClass}' expected.");
        }
    }
}
