<?php

namespace Comrade42\PhpBBParser\Entity;

/**
 * Interface TopicInterface
 * @package Comrade42\PhpBBParser\Entity
 */
interface TopicInterface extends EntityInterface
{
    /**
     * @param int $id
     * @return TopicInterface
     */
    public function setForumId($id);

    /**
     * @param int $id
     * @return TopicInterface
     */
    public function setMemberStartedId($id);

    /**
     * @param int $id
     * @return TopicInterface
     */
    public function setMemberUpdatedId($id);

    /**
     * @param int $id
     * @return TopicInterface
     */
    public function setFirstMessageId($id);

    /**
     * @param int $id
     * @return TopicInterface
     */
    public function setLastMessageId($id);

    /**
     * @param string $title
     * @return TopicInterface
     */
    public function setTitle($title);

    /**
     * @param bool $isSticky
     * @return TopicInterface
     */
    public function setIsSticky($isSticky);

    /**
     * @param bool $isLocked
     * @return TopicInterface
     */
    public function setIsLocked($isLocked);

    /**
     * @param int $number
     * @return TopicInterface
     */
    public function setRepliesNumber($number);

    /**
     * @param int $number
     * @return TopicInterface
     */
    public function setViewsNumber($number);

    /**
     * @param int $order
     * @return TopicInterface
     */
    public function setOrder($order);
}
