<?php

namespace POS\Model\Entity;

use Doctrine\Common\Collections\Collection;
use POS\Model\Entity;
use POS\Model\Type as EntityType;

/**
 * Table
 *
 * @package POS\Model\Entity
 * @copyright 2015 Phil Thompson
 */
class Table extends Entity implements TableInterface
{
    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var \Doctrine\Common\Collections\Collection $orders
     */
    protected $orders;

    /**
     * @var int $type
     */
    protected $type = EntityType::TYPE_TABLE;

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
     * setOrders
     *
     * @param \Doctrine\Common\Collections\Collection $orders
     * @return $this
     */
    public function setOrders(Collection $orders)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * getOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * getLastOrder
     *
     * @return \POS\Model\Entity\OrderInterface|null
     */
    public function getLastOrder()
    {
        return $this->orders->last();
    }
}
