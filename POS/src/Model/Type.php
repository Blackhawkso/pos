<?php

namespace POS\Model;

use Doctrine\Common\Collections\Collection;

/**
 * Type
 *
 * @package POS\Model
 * @copyright 2015 Phil Thompson
 */
class Type implements TypeInterface
{
    const TYPE_TABLE = 1;
    const TYPE_CATEGORY = 2;
    const TYPE_ITEM = 3;
    const TYPE_ORDER = 4;

    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\Collection $entities
     */
    protected $entities;

    /**
     * @var string $label
     */
    protected $label;

    /**
     * setId
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * getId
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * setEntities
     *
     * @param \Doctrine\Common\Collections\Collection $entities
     * @return $this
     */
    public function setEntities(Collection $entities)
    {
        $this->entities = $entities;

        return $this;
    }

    /**
     * getEntities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * setLabel
     *
     * @param string $label
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * getLabel
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
}
