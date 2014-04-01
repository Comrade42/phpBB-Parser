<?php

namespace Comrade42\PhpBBParser\Entity;

/**
 * Interface EntityInterface
 * @package Comrade42\PhpBBParser\Entity
 */
interface EntityInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return EntityInterface
     */
    public function setId($id);
}
