<?php

namespace Comrade42\PhpBBParser\Bridge;

use Comrade42\PhpBBParser\Entity\EntityInterface;
use Comrade42\PhpBBParser\Entity\SimpleMachines\Member;
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
     * @return Member
     */
    public function getMemberEntity(EntityManager $entityManager, $entityId = null)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\Member $entity */
        $entity = $entityManager->find('Comrade42\PhpBBParser\Entity\SimpleMachines\Member', $entityId);

        if (empty($entity))
        {
            $entity = new Member();
            $entity->idMember = $entityId;
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
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\Member $entity */
        $this->validateEntityClass($entity);

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
     * @return string
     */
    public function getMemberNickname(EntityInterface $entity)
    {
        /** @var \Comrade42\PhpBBParser\Entity\SimpleMachines\Member $entity */
        $this->validateEntityClass($entity);

        return $entity->memberName;
    }

    /**
     * @param EntityInterface $entity
     * @throws \InvalidArgumentException
     */
    protected function validateEntityClass(EntityInterface $entity)
    {
        $expected = 'Comrade42\PhpBBParser\Entity\SimpleMachines\Member';

        if (!$entity instanceof $expected) {
            $actual = get_class($entity);
            throw new \InvalidArgumentException("Wrong entity '{$actual}' specified! Instance of '{$expected}' expected.");
        }
    }
}
