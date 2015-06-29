<?php
namespace POS\Model\Entity;

use Doctrine\Common\Collections\Collection;
use POS\Model\EntityInterface;

/**
 * Category
 *
 * @package POS\Model\Entity
 * @copyright 2015 Phil Thompson
 */
interface CategoryInterface extends EntityInterface
{
    /**
     * setItems
     *
     * @param \Doctrine\Common\Collections\Collection $items
     * @return $this
     */
    public function setItems(Collection $items);

    /**
     * getItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems();

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
}
