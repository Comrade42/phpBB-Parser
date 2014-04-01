<?php

namespace Comrade42\PhpBBParser\Entity;

/**
 * Interface PostInterface
 * @package Comrade42\PhpBBParser\Entity
 */
interface PostInterface extends EntityInterface
{
    /**
     * @param int $id
     * @return PostInterface
     */
    public function setForumId($id);

    /**
     * @param int $id
     * @return PostInterface
     */
    public function setTopicId($id);

    /**
     * @param int $id
     * @return PostInterface
     */
    public function setAuthorId($id);

    /**
     * @param string $name
     * @return PostInterface
     */
    public function setAuthorName($name);

    /**
     * @param \DateTime $dateTime
     * @return PostInterface
     */
    public function setCreateDate(\DateTime $dateTime);

    /**
     * @param string $subject
     * @return PostInterface
     */
    public function setSubject($subject);

    /**
     * @param string $content
     * @return PostInterface
     */
    public function setContent($content);
}
