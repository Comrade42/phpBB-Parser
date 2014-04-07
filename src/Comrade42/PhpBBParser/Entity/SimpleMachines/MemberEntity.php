<?php

namespace Comrade42\PhpBBParser\Entity\SimpleMachines;

use Comrade42\PhpBBParser\Entity\MemberInterface;

/**
 * Class MemberEntity
 * @package Comrade42\PhpBBParser\Entity\SimpleMachines
 * @Entity
 * @Table(name="members", indexes={
 *     @Index(name="member_name", columns={"member_name"}),
 *     @Index(name="real_name", columns={"real_name"}),
 *     @Index(name="date_registered", columns={"date_registered"}),
 *     @Index(name="id_group", columns={"id_group"}),
 *     @Index(name="birthdate", columns={"birthdate"}),
 *     @Index(name="posts", columns={"posts"}),
 *     @Index(name="last_login", columns={"last_login"}),
 *     @Index(name="lngfile", columns={"lngfile"}),
 *     @Index(name="id_post_group", columns={"id_post_group"}),
 *     @Index(name="warning", columns={"warning"}),
 *     @Index(name="total_time_logged_in", columns={"total_time_logged_in"}),
 *     @Index(name="id_theme", columns={"id_theme"})
 * })
 */
class MemberEntity implements MemberInterface
{
    /**
     * @var integer
     *
     * @Column(name="id_member", type="integer", nullable=false)
     * @Id
     */
    private $idMember;

    /**
     * @var string
     *
     * @Column(name="member_name", type="string", length=80, nullable=false)
     */
    private $memberName = '';

    /**
     * @var integer
     *
     * @Column(name="date_registered", type="integer", nullable=false)
     */
    private $dateRegistered = 0;

    /**
     * @var integer
     *
     * @Column(name="posts", type="integer", nullable=false)
     */
    private $posts = 0;

    /**
     * @var integer
     *
     * @Column(name="id_group", type="smallint", nullable=false)
     */
    private $idGroup = 0;

    /**
     * @var string
     *
     * @Column(name="lngfile", type="string", length=255, nullable=false)
     */
    private $lngfile = '';

    /**
     * @var integer
     *
     * @Column(name="last_login", type="integer", nullable=false)
     */
    private $lastLogin = 0;

    /**
     * @var string
     *
     * @Column(name="real_name", type="string", length=255, nullable=false)
     */
    private $realName = '';

    /**
     * @var integer
     *
     * @Column(name="instant_messages", type="smallint", nullable=false)
     */
    private $instantMessages = 0;

    /**
     * @var integer
     *
     * @Column(name="unread_messages", type="smallint", nullable=false)
     */
    private $unreadMessages = 0;

    /**
     * @var integer
     *
     * @Column(name="new_pm", type="smallint", nullable=false)
     */
    private $newPm = 0;

    /**
     * @var string
     *
     * @Column(name="buddy_list", type="text", nullable=false)
     */
    private $buddyList = '';

    /**
     * @var string
     *
     * @Column(name="pm_ignore_list", type="string", length=255, nullable=false)
     */
    private $pmIgnoreList = '';

    /**
     * @var integer
     *
     * @Column(name="pm_prefs", type="integer", nullable=false)
     */
    private $pmPrefs = 0;

    /**
     * @var string
     *
     * @Column(name="mod_prefs", type="string", length=20, nullable=false)
     */
    private $modPrefs = '';

    /**
     * @var string
     *
     * @Column(name="message_labels", type="text", nullable=false)
     */
    private $messageLabels = '';

    /**
     * @var string
     *
     * @Column(name="passwd", type="string", length=64, nullable=false)
     */
    private $passwd = '';

    /**
     * @var string
     *
     * @Column(name="openid_uri", type="text", nullable=false)
     */
    private $openidUri = '';

    /**
     * @var string
     *
     * @Column(name="email_address", type="string", length=255, nullable=false)
     */
    private $emailAddress = '';

    /**
     * @var string
     *
     * @Column(name="personal_text", type="string", length=255, nullable=false)
     */
    private $personalText = '';

    /**
     * @var integer
     *
     * @Column(name="gender", type="smallint", nullable=false)
     */
    private $gender = 0;

//    /**
//     * @var \DateTime
//     *
//     * @Column(name="birthdate", type="date", nullable=false)
//     */
//    private $birthdate = '0001-01-01';

    /**
     * @var string
     *
     * @Column(name="website_title", type="string", length=255, nullable=false)
     */
    private $websiteTitle = '';

    /**
     * @var string
     *
     * @Column(name="website_url", type="string", length=255, nullable=false)
     */
    private $websiteUrl = '';

    /**
     * @var string
     *
     * @Column(name="location", type="string", length=255, nullable=false)
     */
    private $location = '';

    /**
     * @var string
     *
     * @Column(name="icq", type="string", length=255, nullable=false)
     */
    private $icq = '';

    /**
     * @var string
     *
     * @Column(name="aim", type="string", length=255, nullable=false)
     */
    private $aim = '';

    /**
     * @var string
     *
     * @Column(name="yim", type="string", length=32, nullable=false)
     */
    private $yim = '';

    /**
     * @var string
     *
     * @Column(name="msn", type="string", length=255, nullable=false)
     */
    private $msn = '';

    /**
     * @var boolean
     *
     * @Column(name="hide_email", type="boolean", nullable=false)
     */
    private $hideEmail = 1;

    /**
     * @var boolean
     *
     * @Column(name="show_online", type="boolean", nullable=false)
     */
    private $showOnline = 1;

    /**
     * @var string
     *
     * @Column(name="time_format", type="string", length=80, nullable=false)
     */
    private $timeFormat = '';

    /**
     * @var string
     *
     * @Column(name="signature", type="text", nullable=false)
     */
    private $signature = '';

    /**
     * @var float
     *
     * @Column(name="time_offset", type="float", precision=10, scale=0, nullable=false)
     */
    private $timeOffset = 0;

    /**
     * @var string
     *
     * @Column(name="avatar", type="string", length=255, nullable=false)
     */
    private $avatar = '';

    /**
     * @var boolean
     *
     * @Column(name="pm_email_notify", type="boolean", nullable=false)
     */
    private $pmEmailNotify = 0;

    /**
     * @var integer
     *
     * @Column(name="karma_bad", type="smallint", nullable=false)
     */
    private $karmaBad = 0;

    /**
     * @var integer
     *
     * @Column(name="karma_good", type="smallint", nullable=false)
     */
    private $karmaGood = 0;

    /**
     * @var string
     *
     * @Column(name="usertitle", type="string", length=255, nullable=false)
     */
    private $usertitle = '';

    /**
     * @var boolean
     *
     * @Column(name="notify_announcements", type="boolean", nullable=false)
     */
    private $notifyAnnouncements = 1;

    /**
     * @var integer
     *
     * @Column(name="notify_regularity", type="smallint", nullable=false)
     */
    private $notifyRegularity = 1;

    /**
     * @var boolean
     *
     * @Column(name="notify_send_body", type="boolean", nullable=false)
     */
    private $notifySendBody = 0;

    /**
     * @var integer
     *
     * @Column(name="notify_types", type="smallint", nullable=false)
     */
    private $notifyTypes = 2;

    /**
     * @var string
     *
     * @Column(name="member_ip", type="string", length=255, nullable=false)
     */
    private $memberIp = '';

    /**
     * @var string
     *
     * @Column(name="member_ip2", type="string", length=255, nullable=false)
     */
    private $memberIp2 = '';

    /**
     * @var string
     *
     * @Column(name="secret_question", type="string", length=255, nullable=false)
     */
    private $secretQuestion = '';

    /**
     * @var string
     *
     * @Column(name="secret_answer", type="string", length=64, nullable=false)
     */
    private $secretAnswer = '';

    /**
     * @var integer
     *
     * @Column(name="id_theme", type="smallint", nullable=false)
     */
    private $idTheme = 0;

    /**
     * @var boolean
     *
     * @Column(name="is_activated", type="boolean", nullable=false)
     */
    private $isActivated = 1;

    /**
     * @var string
     *
     * @Column(name="validation_code", type="string", length=10, nullable=false)
     */
    private $validationCode = '';

    /**
     * @var integer
     *
     * @Column(name="id_msg_last_visit", type="integer", nullable=false)
     */
    private $idMsgLastVisit = 0;

    /**
     * @var string
     *
     * @Column(name="additional_groups", type="string", length=255, nullable=false)
     */
    private $additionalGroups = '';

    /**
     * @var string
     *
     * @Column(name="smiley_set", type="string", length=48, nullable=false)
     */
    private $smileySet = '';

    /**
     * @var integer
     *
     * @Column(name="id_post_group", type="smallint", nullable=false)
     */
    private $idPostGroup = 0;

    /**
     * @var integer
     *
     * @Column(name="total_time_logged_in", type="integer", nullable=false)
     */
    private $totalTimeLoggedIn = 0;

    /**
     * @var string
     *
     * @Column(name="password_salt", type="string", length=255, nullable=false)
     */
    private $passwordSalt = '';

    /**
     * @var string
     *
     * @Column(name="ignore_boards", type="text", nullable=false)
     */
    private $ignoreBoards = '';

    /**
     * @var integer
     *
     * @Column(name="warning", type="smallint", nullable=false)
     */
    private $warning = 0;

    /**
     * @var string
     *
     * @Column(name="passwd_flood", type="string", length=12, nullable=false)
     */
    private $passwdFlood = '';

    /**
     * @var integer
     *
     * @Column(name="pm_receive_from", type="smallint", nullable=false)
     */
    private $pmReceiveFrom = 1;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->idMember;
    }

    /**
     * @param int $id
     * @return MemberEntity
     */
    public function setId($id)
    {
        $this->idMember = intval($id);

        return $this;
    }

    /**
     * @param string $nickname
     * @return MemberEntity
     */
    public function setNickname($nickname)
    {
        $this->memberName = strval($nickname);

        return $this;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->memberName;
    }

    /**
     * @param string $realName
     * @return MemberEntity
     */
    public function setRealName($realName)
    {
        $this->realName = strval($realName);

        return $this;
    }

    /**
     * @param \DateTime $dateTime
     * @return MemberEntity
     */
    public function setRegDate(\DateTime $dateTime)
    {
        $this->dateRegistered = $dateTime->getTimestamp();

        return $this;
    }

    /**
     * @param string $password
     * @return MemberEntity
     */
    public function setPassword($password)
    {
        $this->passwd = sha1(strtolower($this->memberName) . $password);
        $this->passwordSalt = substr(md5(mt_rand()), 0, 4);

        return $this;
    }

    /**
     * @param string $emailAddress
     * @return MemberEntity
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = strval($emailAddress);

        return $this;
    }

    /**
     * @param string $avatarUrl
     * @return MemberEntity
     */
    public function setAvatarUrl($avatarUrl)
    {
        $this->avatar = strval($avatarUrl);

        return $this;
    }
}
