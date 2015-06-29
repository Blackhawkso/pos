<?php

namespace POS\Model\Entity;

use Doctrine\Common\Collections\Collection;
use POS\Model\EntityInterface;

/**
 * Table
 *
 * @package POS\Model\Entity
 * @copyright 2015 Phil Thompson
 */
interface TableInterface extends EntityInterface
{
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
     * setOrders
     *
     * @param \Doctrine\Common\Collections\Collection $orders
     * @return $this
     */
    public function setOrders(Collection $orders);

    /**
     * getOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrders();

    /**
     * getLastOrder
     *
     * @return \POS\Model\Entity\OrderInterface|null
     */
    public function getLastOrder();
}
