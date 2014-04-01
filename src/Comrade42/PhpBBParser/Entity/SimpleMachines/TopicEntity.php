<?php

namespace Comrade42\PhpBBParser\Entity\SimpleMachines;

use Comrade42\PhpBBParser\Entity\TopicInterface;

/**
 * Class TopicEntity
 * @package Comrade42\PhpBBParser\Entity\SimpleMachines
 * @Entity
 * @Table(
 *     name="topics",
 *     uniqueConstraints={
 *         @UniqueConstraint(name="last_message", columns={"id_last_msg", "id_board"}),
 *         @UniqueConstraint(name="first_message", columns={"id_first_msg", "id_board"}),
 *         @UniqueConstraint(name="poll", columns={"id_poll", "id_topic"})
 *     },
 *     indexes={
 *         @Index(name="is_sticky", columns={"is_sticky"}),
 *         @Index(name="approved", columns={"approved"}),
 *         @Index(name="id_board", columns={"id_board"}),
 *         @Index(name="member_started", columns={"id_member_started", "id_board"}),
 *         @Index(name="last_message_sticky", columns={"id_board", "is_sticky", "id_last_msg"}),
 *         @Index(name="board_news", columns={"id_board", "id_first_msg"})
 *     }
 * )
 */
class TopicEntity implements TopicInterface
{
    /**
     * @var integer
     *
     * @Column(name="id_topic", type="integer", nullable=false)
     * @Id
     */
    private $idTopic;

    /**
     * @var boolean
     *
     * @Column(name="is_sticky", type="boolean", nullable=false)
     */
    private $isSticky = false;

    /**
     * @var integer
     *
     * @Column(name="id_board", type="smallint", nullable=false)
     */
    private $idBoard = 0;

    /**
     * @var integer
     *
     * @Column(name="id_first_msg", type="integer", nullable=false)
     */
    private $idFirstMsg = 0;

    /**
     * @var integer
     *
     * @Column(name="id_last_msg", type="integer", nullable=false)
     */
    private $idLastMsg = 0;

    /**
     * @var integer
     *
     * @Column(name="id_member_started", type="integer", nullable=false)
     */
    private $idMemberStarted = 0;

    /**
     * @var integer
     *
     * @Column(name="id_member_updated", type="integer", nullable=false)
     */
    private $idMemberUpdated = 0;

    /**
     * @var integer
     *
     * @Column(name="id_poll", type="integer", nullable=false)
     */
    private $idPoll = 0;

    /**
     * @var integer
     *
     * @Column(name="id_previous_board", type="smallint", nullable=false)
     */
    private $idPreviousBoard = 0;

    /**
     * @var integer
     *
     * @Column(name="id_previous_topic", type="integer", nullable=false)
     */
    private $idPreviousTopic = 0;

    /**
     * @var integer
     *
     * @Column(name="num_replies", type="integer", nullable=false)
     */
    private $numReplies = 0;

    /**
     * @var integer
     *
     * @Column(name="num_views", type="integer", nullable=false)
     */
    private $numViews = 0;

    /**
     * @var boolean
     *
     * @Column(name="locked", type="boolean", nullable=false)
     */
    private $locked = false;

    /**
     * @var integer
     *
     * @Column(name="unapproved_posts", type="smallint", nullable=false)
     */
    private $unapprovedPosts = 0;

    /**
     * @var boolean
     *
     * @Column(name="approved", type="boolean", nullable=false)
     */
    private $approved = true;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->idTopic;
    }

    /**
     * @param int $id
     * @return TopicEntity
     */
    public function setId($id)
    {
        $this->idTopic = intval($id);

        return $this;
    }

    /**
     * @param int $id
     * @return TopicEntity
     */
    public function setForumId($id)
    {
        $this->idBoard = intval($id);

        return $this;
    }

    /**
     * @param int $id
     * @return TopicEntity
     */
    public function setMemberStartedId($id)
    {
        $this->idMemberStarted = intval($id);

        return $this;
    }

    /**
     * @param int $id
     * @return TopicEntity
     */
    public function setMemberUpdatedId($id)
    {
        $this->idMemberUpdated = intval($id);

        return $this;
    }

    /**
     * @param int $id
     * @return TopicEntity
     */
    public function setFirstMessageId($id)
    {
        $this->idFirstMsg = intval($id);

        return $this;
    }

    /**
     * @param int $id
     * @return TopicEntity
     */
    public function setLastMessageId($id)
    {
        $this->idLastMsg = intval($id);

        return $this;
    }

    /**
     * @param string $title
     * @return TopicEntity
     */
    public function setTitle($title)
    {
        return $this;
    }

    /**
     * @param bool $isSticky
     * @return TopicEntity
     */
    public function setIsSticky($isSticky)
    {
        $this->isSticky = (bool) $isSticky;

        return $this;
    }

    /**
     * @param bool $isLocked
     * @return TopicEntity
     */
    public function setIsLocked($isLocked)
    {
        $this->locked = (bool) $isLocked;

        return $this;
    }

    /**
     * @param int $number
     * @return TopicEntity
     */
    public function setRepliesNumber($number)
    {
        $this->numReplies = intval($number);

        return $this;
    }

    /**
     * @param int $number
     * @return TopicEntity
     */
    public function setViewsNumber($number)
    {
        $this->numViews = intval($number);

        return $this;
    }

    /**
     * @param int $order
     * @return TopicEntity
     */
    public function setOrder($order)
    {
        return $this;
    }
}
