<?php

namespace Comrade42\PhpBBParser\Entity;

/**
 * Interface MemberInterface
 * @package Comrade42\PhpBBParser\Entity
 */
interface MemberInterface extends EntityInterface
{
    /**
     * @param string $nickname
     * @return MemberInterface
     */
    public function setNickname($nickname);

    /**
     * @return string
     */
    public function getNickname();

    /**
     * @param string $realName
     * @return MemberInterface
     */
    public function setRealName($realName);

    /**
     * @param \DateTime $dateTime
     * @return MemberInterface
     */
    public function setRegDate(\DateTime $dateTime);

    /**
     * @param string $password
     * @return MemberInterface
     */
    public function setPassword($password);

    /**
     * @param string $emailAddress
     * @return MemberInterface
     */
    public function setEmailAddress($emailAddress);

    /**
     * @param string $avatarUrl
     * @return MemberInterface
     */
    public function setAvatarUrl($avatarUrl);
}
