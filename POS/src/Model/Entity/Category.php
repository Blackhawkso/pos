<?php

namespace POS\Model\Entity;

use Doctrine\Common\Collections\Collection;
use POS\Model\Entity;
use POS\Model\Type as EntityType;

/**
 * Category
 *
 * @package POS\Model\Entity
 * @copyright 2015 Phil Thompson
 */
class Category extends Entity implements CategoryInterface
{
    /**
     * @var \Doctrine\Common\Collections\Collection $items
     */
    protected $items;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var int $type
     */
    protected $type = EntityType::TYPE_CATEGORY;

    /**
     * setItems
     *
     * @param \Doctrine\Common\Collections\Collection $items
     * @return $this
     */
    public function setItems(Collection $items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * getItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * setName
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * getName
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
