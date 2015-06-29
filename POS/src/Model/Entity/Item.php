<?php

namespace POS\Model\Entity;

use POS\Model\Entity;
use POS\Model\Type as EntityType;

/**
 * Item
 *
 * @package POS\Model\Entity
 * @copyright 2015 Phil Thompson
 */
class Item extends Entity implements ItemInterface
{
    /**
     * @var \POS\Model\Entity\CategoryInterface $category
     */
    protected $category;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var int $price
     */
    protected $price;

    /**
     * @var int $type
     */
    protected $type = EntityType::TYPE_ITEM;

    /**
     * setCategory
     *
     * @param \POS\Model\Entity\CategoryInterface $category
     * @return $this
     */
    public function setCategory(CategoryInterface $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * getCategory
     *
     * @return \POS\Model\Entity\CategoryInterface
     */
    public function getCategory()
    {
        return $this->category;
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

    /**
     * setPrice
     *
     * @param float $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price * 100;

        return $this;
    }

    /**
     * getPrice
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price / 100;
    }
}
