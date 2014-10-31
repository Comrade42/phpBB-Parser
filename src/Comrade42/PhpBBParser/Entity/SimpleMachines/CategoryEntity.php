<?php

namespace Comrade42\PhpBBParser\Entity\SimpleMachines;

use Comrade42\PhpBBParser\Entity\CategoryInterface;

/**
 * Class CategoryEntity
 * @package Comrade42\PhpBBParser\Entity\SimpleMachines
 * @Entity
 * @Table(name="categories")
 */
class CategoryEntity implements CategoryInterface
{
    /**
     * @var integer
     *
     * @Column(name="id_cat", type="smallint", nullable=false)
     * @Id
     */
    public $idCat;

    /**
     * @var integer
     *
     * @Column(name="cat_order", type="smallint", nullable=false)
     */
    public $catOrder = 0;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=255, nullable=false)
     */
    public $name = '';

    /**
     * @var boolean
     *
     * @Column(name="can_collapse", type="boolean", nullable=false)
     */
    public $canCollapse = 1;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->idCat;
    }

    /**
     * @param int $id
     * @return CategoryEntity
     */
    public function setId($id)
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
     * @param string $name
     * @param int $order
     * @return $this
     */
    public function fill($name, $order)
    {
        $this->name     = strval($name);
        $this->catOrder = intval($order);

        return $this;
    }
}
