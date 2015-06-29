<?php

namespace POS\Model\Entity;

use POS\Model\EntityInterface;

/**
 * Item
 *
 * @package POS\Model\Entity
 * @copyright 2015 Phil Thompson
 */
interface ItemInterface extends EntityInterface
{
    /**
     * setCategory
     *
     * @param \POS\Model\Entity\CategoryInterface $category
     * @return $this
     */
    public function setCategory(CategoryInterface $category);

    /**
     * getCategory
     *
     * @return \POS\Model\Entity\CategoryInterface
     */
    public function getCategory();

    /**
     * setName
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * getName
     *
     * @return string
     */
    public function getName();

    /**
     * setPrice
     *
     * @param float $price
     * @return $this
     */
    public function setPrice($price);

    /**
     * getPrice
     *
     * @return float
     */
    public function getPrice();
}
