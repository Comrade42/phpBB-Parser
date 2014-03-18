<?php

namespace Comrade42\PhpBBParser\Entity\SimpleMachines;

use Comrade42\PhpBBParser\Entity\EntityInterface;

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
class MemberEntity implements EntityInterface
{
    /**
     * @var integer
     *
     * @Column(name="id_member", type="integer", nullable=false)
     * @Id
     */
    public $idMember;

    /**
     * @var string
     *
     * @Column(name="member_name", type="string", length=80, nullable=false)
     */
    public $memberName = '';

    /**
     * @var integer
     *
     * @Column(name="date_registered", type="integer", nullable=false)
     */
    public $dateRegistered = 0;

    /**
     * @var integer
     *
     * @Column(name="posts", type="integer", nullable=false)
     */
    public $posts = 0;

    /**
     * @var integer
     *
     * @Column(name="id_group", type="smallint", nullable=false)
     */
    public $idGroup = 0;

    /**
     * @var string
     *
     * @Column(name="lngfile", type="string", length=255, nullable=false)
     */
    public $lngfile = '';

    /**
     * @var integer
     *
     * @Column(name="last_login", type="integer", nullable=false)
     */
    public $lastLogin = 0;

    /**
     * @var string
     *
     * @Column(name="real_name", type="string", length=255, nullable=false)
     */
    public $realName = '';

    /**
     * @var integer
     *
     * @Column(name="instant_messages", type="smallint", nullable=false)
     */
    public $instantMessages = 0;

    /**
     * @var integer
     *
     * @Column(name="unread_messages", type="smallint", nullable=false)
     */
    public $unreadMessages = 0;

    /**
     * @var boolean
     *
     * @Column(name="new_pm", type="boolean", nullable=false)
     */
    public $newPm = 0;

    /**
     * @var string
     *
     * @Column(name="buddy_list", type="text", nullable=false)
     */
    public $buddyList = '';

    /**
     * @var string
     *
     * @Column(name="pm_ignore_list", type="string", length=255, nullable=false)
     */
    public $pmIgnoreList = '';

    /**
     * @var integer
     *
     * @Column(name="pm_prefs", type="integer", nullable=false)
     */
    public $pmPrefs = 0;

    /**
     * @var string
     *
     * @Column(name="mod_prefs", type="string", length=20, nullable=false)
     */
    public $modPrefs = '';

    /**
     * @var string
     *
     * @Column(name="message_labels", type="text", nullable=false)
     */
    public $messageLabels = '';

    /**
     * @var string
     *
     * @Column(name="passwd", type="string", length=64, nullable=false)
     */
    public $passwd = '';

    /**
     * @var string
     *
     * @Column(name="openid_uri", type="text", nullable=false)
     */
    public $openidUri = '';

    /**
     * @var string
     *
     * @Column(name="email_address", type="string", length=255, nullable=false)
     */
    public $emailAddress = '';

    /**
     * @var string
     *
     * @Column(name="personal_text", type="string", length=255, nullable=false)
     */
    public $personalText = '';

    /**
     * @var boolean
     *
     * @Column(name="gender", type="boolean", nullable=false)
     */
    public $gender = 0;

//    /**
//     * @var \DateTime
//     *
//     * @Column(name="birthdate", type="date", nullable=false)
//     */
//    public $birthdate = '0001-01-01';

    /**
     * @var string
     *
     * @Column(name="website_title", type="string", length=255, nullable=false)
     */
    public $websiteTitle = '';

    /**
     * @var string
     *
     * @Column(name="website_url", type="string", length=255, nullable=false)
     */
    public $websiteUrl = '';

    /**
     * @var string
     *
     * @Column(name="location", type="string", length=255, nullable=false)
     */
    public $location = '';

    /**
     * @var string
     *
     * @Column(name="icq", type="string", length=255, nullable=false)
     */
    public $icq = '';

    /**
     * @var string
     *
     * @Column(name="aim", type="string", length=255, nullable=false)
     */
    public $aim = '';

    /**
     * @var string
     *
     * @Column(name="yim", type="string", length=32, nullable=false)
     */
    public $yim = '';

    /**
     * @var string
     *
     * @Column(name="msn", type="string", length=255, nullable=false)
     */
    public $msn = '';

    /**
     * @var boolean
     *
     * @Column(name="hide_email", type="boolean", nullable=false)
     */
    public $hideEmail = 0;

    /**
     * @var boolean
     *
     * @Column(name="show_online", type="boolean", nullable=false)
     */
    public $showOnline = 1;

    /**
     * @var string
     *
     * @Column(name="time_format", type="string", length=80, nullable=false)
     */
    public $timeFormat = '';

    /**
     * @var string
     *
     * @Column(name="signature", type="text", nullable=false)
     */
    public $signature = '';

    /**
     * @var float
     *
     * @Column(name="time_offset", type="float", precision=10, scale=0, nullable=false)
     */
    public $timeOffset = 0;

    /**
     * @var string
     *
     * @Column(name="avatar", type="string", length=255, nullable=false)
     */
    public $avatar = '';

    /**
     * @var boolean
     *
     * @Column(name="pm_email_notify", type="boolean", nullable=false)
     */
    public $pmEmailNotify = 0;

    /**
     * @var integer
     *
     * @Column(name="karma_bad", type="smallint", nullable=false)
     */
    public $karmaBad = 0;

    /**
     * @var integer
     *
     * @Column(name="karma_good", type="smallint", nullable=false)
     */
    public $karmaGood = 0;

    /**
     * @var string
     *
     * @Column(name="usertitle", type="string", length=255, nullable=false)
     */
    public $usertitle = '';

    /**
     * @var boolean
     *
     * @Column(name="notify_announcements", type="boolean", nullable=false)
     */
    public $notifyAnnouncements = 1;

    /**
     * @var boolean
     *
     * @Column(name="notify_regularity", type="boolean", nullable=false)
     */
    public $notifyRegularity = 1;

    /**
     * @var boolean
     *
     * @Column(name="notify_send_body", type="boolean", nullable=false)
     */
    public $notifySendBody = 0;

    /**
     * @var boolean
     *
     * @Column(name="notify_types", type="boolean", nullable=false)
     */
    public $notifyTypes = 2;

    /**
     * @var string
     *
     * @Column(name="member_ip", type="string", length=255, nullable=false)
     */
    public $memberIp = '';

    /**
     * @var string
     *
     * @Column(name="member_ip2", type="string", length=255, nullable=false)
     */
    public $memberIp2 = '';

    /**
     * @var string
     *
     * @Column(name="secret_question", type="string", length=255, nullable=false)
     */
    public $secretQuestion = '';

    /**
     * @var string
     *
     * @Column(name="secret_answer", type="string", length=64, nullable=false)
     */
    public $secretAnswer = '';

    /**
     * @var boolean
     *
     * @Column(name="id_theme", type="boolean", nullable=false)
     */
    public $idTheme = 0;

    /**
     * @var boolean
     *
     * @Column(name="is_activated", type="boolean", nullable=false)
     */
    public $isActivated = 1;

    /**
     * @var string
     *
     * @Column(name="validation_code", type="string", length=10, nullable=false)
     */
    public $validationCode = '';

    /**
     * @var integer
     *
     * @Column(name="id_msg_last_visit", type="integer", nullable=false)
     */
    public $idMsgLastVisit = 0;

    /**
     * @var string
     *
     * @Column(name="additional_groups", type="string", length=255, nullable=false)
     */
    public $additionalGroups = '';

    /**
     * @var string
     *
     * @Column(name="smiley_set", type="string", length=48, nullable=false)
     */
    public $smileySet = '';

    /**
     * @var integer
     *
     * @Column(name="id_post_group", type="smallint", nullable=false)
     */
    public $idPostGroup = 0;

    /**
     * @var integer
     *
     * @Column(name="total_time_logged_in", type="integer", nullable=false)
     */
    public $totalTimeLoggedIn = 0;

    /**
     * @var string
     *
     * @Column(name="password_salt", type="string", length=255, nullable=false)
     */
    public $passwordSalt = '';

    /**
     * @var string
     *
     * @Column(name="ignore_boards", type="text", nullable=false)
     */
    public $ignoreBoards = '';

    /**
     * @var boolean
     *
     * @Column(name="warning", type="boolean", nullable=false)
     */
    public $warning = 0;

    /**
     * @var string
     *
     * @Column(name="passwd_flood", type="string", length=12, nullable=false)
     */
    public $passwdFlood = '';

    /**
     * @var boolean
     *
     * @Column(name="pm_receive_from", type="boolean", nullable=false)
     */
    public $pmReceiveFrom = 1;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->idMember;
    }
}
