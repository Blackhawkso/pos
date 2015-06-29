<?php
namespace POS\Model\Entity\Order;

use POS\Model\Entity\ItemInterface;
use POS\Model\Entity\OrderInterface;


/**
 * OrderItemInterface
 *
 * @package POS\Model\Entity\Order
 * @copyright 2015 Phil Thompson
 */
interface OrderItemInterface
{
    /**
     * setItem
     *
     * @param \POS\Model\Entity\ItemInterface $item
     * @return \POS\Model\Entity\ItemInterface
     */
    public function setItem(ItemInterface $item);

    /**
     * getItem
     *
     * @return \POS\Model\Entity\ItemInterface
     */
    public function getItem();

    /**
     * setOrder
     *
     * @param \POS\Model\Entity\OrderInterface $order
     * @return \POS\Model\Entity\ItemInterface
     */
    public function setOrder(OrderInterface $order);

    /**
     * getOrder
     *
     * @return \POS\Model\Entity\OrderInterface
     */
    public function getOrder();

    /**
     * setQty
     *
     * @param int $qty
     * @return $this
     */
    public function setQty($qty);

    /**
     * getQty
     *
     * @return int
     */
    public function getQty();

    /**
     * getTotal
     *
     * @return float
     */
    public function getTotal();
}
