<?php

namespace POS\Model\Entity\Order;

use POS\Model\Entity\ItemInterface;
use POS\Model\Entity\OrderInterface;

/**
 * OrderItem
 *
 * @package POS\Model\Entity\Order
 * @copyright 2015 Phil Thompson
 */
class OrderItem implements OrderItemInterface
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var \POS\Model\Entity\ItemInterface $item
     */
    protected $item;

    /**
     * @var \POS\Model\Entity\OrderInterface $order
     */
    protected $order;

    /**
     * @var int $qty
     */
    protected $qty;

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
     * setItem
     *
     * @param \POS\Model\Entity\ItemInterface $item
     * @return $this
     */
    public function setItem(ItemInterface $item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * getItem
     *
     * @return \POS\Model\Entity\ItemInterface
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * setOrder
     *
     * @param \POS\Model\Entity\OrderInterface $order
     * @return $this
     */
    public function setOrder(OrderInterface $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * getOrder
     *
     * @return \POS\Model\Entity\OrderInterface
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * setQty
     *
     * @param int $qty
     * @return $this
     */
    public function setQty($qty)
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * getQty
     *
     * @return int
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * getTotal
     *
     * @return float
     */
    public function getTotal()
    {
        $total = $this->getItem()->getPrice() * $this->getQty();

        return $total;
    }
}
