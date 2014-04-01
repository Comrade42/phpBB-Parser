<?php

namespace Comrade42\PhpBBParser\Entity;

/**
 * Interface ForumInterface
 * @package Comrade42\PhpBBParser\Entity
 */
interface ForumInterface extends EntityInterface
{
    /**
     * @param int $id
     * @return ForumInterface
     */
    public function setCategoryId($id);

    /**
     * @param string $title
     * @return ForumInterface
     */
    public function setTitle($title);

    /**
     * @param string $description
     * @return ForumInterface
     */
    public function setDescription($description);

    /**
     * @param int $order
     * @return ForumInterface
     */
    public function setOrder($order);

    /**
     * @return string
     */
    public function getTitle();
}
