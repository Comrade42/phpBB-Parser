<?php

namespace Comrade42\PhpBBParser\Entity;

/**
 * Interface CategoryInterface
 * @package Comrade42\PhpBBParser\Entity
 */
interface CategoryInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $name
     * @param int $order
     * @return $this
     */
    public function fill($name, $order);
}
