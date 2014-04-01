<?php

namespace Comrade42\PhpBBParser\Entity\SimpleMachines;

use Comrade42\PhpBBParser\Entity\ForumInterface;

/**
 * Class BoardEntity
 * @package Comrade42\PhpBBParser\Entity\SimpleMachines
 * @Entity
 * @Table(
 *     name="boards",
 *     uniqueConstraints={
 *         @UniqueConstraint(name="categories", columns={"id_cat", "id_board"})
 *     },
 *     indexes={
 *         @Index(name="id_parent", columns={"id_parent"}),
 *         @Index(name="id_msg_updated", columns={"id_msg_updated"}),
 *         @Index(name="member_groups", columns={"member_groups"})
 *     }
 * )
 */
class BoardEntity implements ForumInterface
{
    /**
     * @var integer
     *
     * @Column(name="id_board", type="smallint", nullable=false)
     * @Id
     */
    public $idBoard;

    /**
     * @var integer
     *
     * @Column(name="id_cat", type="smallint", nullable=false)
     */
    public $idCat = 0;

    /**
     * @var integer
     *
     * @Column(name="child_level", type="smallint", nullable=false)
     */
    public $childLevel = 0;

    /**
     * @var integer
     *
     * @Column(name="id_parent", type="smallint", nullable=false)
     */
    public $idParent = 0;

    /**
     * @var integer
     *
     * @Column(name="board_order", type="smallint", nullable=false)
     */
    public $boardOrder = 0;

    /**
     * @var integer
     *
     * @Column(name="id_last_msg", type="integer", nullable=false)
     */
    public $idLastMsg = 0;

    /**
     * @var integer
     *
     * @Column(name="id_msg_updated", type="integer", nullable=false)
     */
    public $idMsgUpdated = 0;

    /**
     * @var string
     *
     * @Column(name="member_groups", type="string", length=255, nullable=false)
     */
    public $memberGroups = '-1,0';

    /**
     * @var integer
     *
     * @Column(name="id_profile", type="smallint", nullable=false)
     */
    public $idProfile = 1;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=255, nullable=false)
     */
    public $name = '';

    /**
     * @var string
     *
     * @Column(name="description", type="text", nullable=false)
     */
    public $description;

    /**
     * @var integer
     *
     * @Column(name="num_topics", type="integer", nullable=false)
     */
    public $numTopics = 0;

    /**
     * @var integer
     *
     * @Column(name="num_posts", type="integer", nullable=false)
     */
    public $numPosts = 0;

    /**
     * @var integer
     *
     * @Column(name="count_posts", type="smallint", nullable=false)
     */
    public $countPosts = 0;

    /**
     * @var integer
     *
     * @Column(name="id_theme", type="smallint", nullable=false)
     */
    public $idTheme = 0;

    /**
     * @var integer
     *
     * @Column(name="override_theme", type="smallint", nullable=false)
     */
    public $overrideTheme = 0;

    /**
     * @var integer
     *
     * @Column(name="unapproved_posts", type="smallint", nullable=false)
     */
    public $unapprovedPosts = 0;

    /**
     * @var integer
     *
     * @Column(name="unapproved_topics", type="smallint", nullable=false)
     */
    public $unapprovedTopics = 0;

    /**
     * @var string
     *
     * @Column(name="redirect", type="string", length=255, nullable=false)
     */
    public $redirect = '';

    /**
     * @return int
     */
    public function getId()
    {
        return $this->idBoard;
    }

    /**
     * @param int $id
     * @return BoardEntity
     */
    public function setId($id)
    {
        $this->idBoard = intval($id);

        return $this;
    }

    /**
     * @param int $id
     * @return BoardEntity
     */
    public function setCategoryId($id)
    {
        $this->idCat = intval($id);

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->name;
    }

    /**
     * @param string $title
     * @return BoardEntity
     */
    public function setTitle($title)
    {
        $this->name = strval($title);

        return $this;
    }

    /**
     * @param string $description
     * @return BoardEntity
     */
    public function setDescription($description)
    {
        $this->description = strval($description);

        return $this;
    }

    /**
     * @param int $order
     * @return BoardEntity
     */
    public function setOrder($order)
    {
        $this->boardOrder = intval($order);

        return $this;
    }
}
