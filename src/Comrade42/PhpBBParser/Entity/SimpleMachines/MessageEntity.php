<?php

namespace Comrade42\PhpBBParser\Entity\SimpleMachines;

use Comrade42\PhpBBParser\Entity\PostInterface;

/**
 * Class Messages
 * @package Comrade42\PhpBBParser\Entity\SimpleMachines
 * @Entity
 * @Table(
 *     name="messages",
 *     uniqueConstraints={
 *         @UniqueConstraint(name="topic", columns={"id_topic", "id_msg"}),
 *         @UniqueConstraint(name="id_board", columns={"id_board", "id_msg"}),
 *         @UniqueConstraint(name="id_member", columns={"id_member", "id_msg"})
 *     },
 *     indexes={
 *         @Index(name="approved", columns={"approved"}),
 *         @Index(name="ip_index", columns={"poster_ip", "id_topic"}),
 *         @Index(name="participation", columns={"id_member", "id_topic"}),
 *         @Index(name="show_posts", columns={"id_member", "id_board"}),
 *         @Index(name="id_topic", columns={"id_topic"}),
 *         @Index(name="id_member_msg", columns={"id_member", "approved", "id_msg"}),
 *         @Index(name="current_topic", columns={"id_topic", "id_msg", "id_member", "approved"}),
 *         @Index(name="related_ip", columns={"id_member", "poster_ip", "id_msg"})
 *     }
 * )
 */
class MessageEntity implements PostInterface
{
    /**
     * @var integer
     *
     * @Column(name="id_msg", type="integer", nullable=false)
     * @Id
     */
    private $idMsg;

    /**
     * @var integer
     *
     * @Column(name="id_topic", type="integer", nullable=false)
     */
    private $idTopic = 0;

    /**
     * @var integer
     *
     * @Column(name="id_board", type="smallint", nullable=false)
     */
    private $idBoard = 0;

    /**
     * @var integer
     *
     * @Column(name="poster_time", type="integer", nullable=false)
     */
    private $posterTime = 0;

    /**
     * @var integer
     *
     * @Column(name="id_member", type="integer", nullable=false)
     */
    private $idMember = 0;

    /**
     * @var integer
     *
     * @Column(name="id_msg_modified", type="integer", nullable=false)
     */
    private $idMsgModified = 0;

    /**
     * @var string
     *
     * @Column(name="subject", type="string", length=255, nullable=false)
     */
    private $subject = '';

    /**
     * @var string
     *
     * @Column(name="poster_name", type="string", length=255, nullable=false)
     */
    private $posterName = '';

    /**
     * @var string
     *
     * @Column(name="poster_email", type="string", length=255, nullable=false)
     */
    private $posterEmail = '';

    /**
     * @var string
     *
     * @Column(name="poster_ip", type="string", length=255, nullable=false)
     */
    private $posterIp = '';

    /**
     * @var boolean
     *
     * @Column(name="smileys_enabled", type="boolean", nullable=false)
     */
    private $smileysEnabled = 1;

    /**
     * @var integer
     *
     * @Column(name="modified_time", type="integer", nullable=false)
     */
    private $modifiedTime = 0;

    /**
     * @var string
     *
     * @Column(name="modified_name", type="string", length=255, nullable=false)
     */
    private $modifiedName = '';

    /**
     * @var string
     *
     * @Column(name="body", type="text", nullable=false)
     */
    private $body;

    /**
     * @var string
     *
     * @Column(name="icon", type="string", length=16, nullable=false)
     */
    private $icon = 'xx';

    /**
     * @var boolean
     *
     * @Column(name="approved", type="boolean", nullable=false)
     */
    private $approved = '1';

    /**
     * @return int
     */
    public function getId()
    {
        return $this->idMsg;
    }

    /**
     * @param int $id
     * @return MessageEntity
     */
    public function setId($id)
    {
        $this->idMsg = intval($id);

        return $this;
    }

    /**
     * @param int $id
     * @return MessageEntity
     */
    public function setForumId($id)
    {
        $this->idBoard = intval($id);

        return $this;
    }

    /**
     * @param int $id
     * @return MessageEntity
     */
    public function setTopicId($id)
    {
        $this->idTopic = intval($id);

        return $this;
    }

    /**
     * @param int $id
     * @return MessageEntity
     */
    public function setAuthorId($id)
    {
        $this->idMember = intval($id);

        return $this;
    }

    /**
     * @param string $name
     * @return MessageEntity
     */
    public function setAuthorName($name)
    {
        $this->posterName = strval($name);

        return $this;
    }

    /**
     * @param \DateTime $dateTime
     * @return MessageEntity
     */
    public function setCreateDate(\DateTime $dateTime)
    {
        $this->posterTime = $dateTime->getTimestamp();

        return $this;
    }

    /**
     * @param string $subject
     * @return MessageEntity
     */
    public function setSubject($subject)
    {
        $this->subject = strval($subject);

        return $this;
    }

    /**
     * @param string $content
     * @return MessageEntity
     */
    public function setContent($content)
    {
        $this->body = strval($content);

        return $this;
    }
}
