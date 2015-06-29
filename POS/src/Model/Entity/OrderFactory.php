<?php

namespace POS\Model\Entity;

use DateTime;
use POS\Model\EntityFactory;
use POS\Model\Type as EntityType;

/**
 * OrderFactory
 *
 * @package POS\Model\Entity
 * @copyright 2015 Phil Thompson
 */
class OrderFactory extends EntityFactory
{
    /**
     * @var int $entity_type
     */
    protected $entity_type = EntityType::TYPE_ORDER;

    /**
     * @var \POS\Model\Entity\ItemInterface $item
     */
    protected $item;

    /**
     * @var \POS\Model\Entity\TableInterface $table
     */
    protected $table;

    /**
     * @var \DateTime $time
     */
    protected $time;

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
     * setTable
     *
     * @param \POS\Model\Entity\TableInterface $table
     * @return $this
     */
    public function setTable(TableInterface $table)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * getTable
     *
     * @return \POS\Model\Entity\TableInterface
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * setTime
     *
     * @param \DateTime $time
     * @return $this
     */
    public function setTime(DateTime $time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * getTime
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * fromArray
     *
     * @param array $data
     */
    public function fromArray(array $data)
    {
        parent::fromArray($data);

        if (isset($data['cover'])) {
            $table = $this->getEntityManager()->find('\POS\Model\Entity\Table', $data['cover']);

            $this->setTable($table);
        }

        $this->setTime(new DateTime());
    }

    /**
     * create
     *
     * @return \POS\Model\Entity\OrderInterface
     * @throws \Exception
     */
    public function create()
    {
        /** @var \POS\Model\Entity\OrderInterface $order */
        $order = parent::create();

        if (!is_null($this->getTable())) {
            $order->setTable($this->getTable());
        }

        if (!is_null($this->getTime())) {
            $order->setTime($this->getTime());
        }

        if (is_null($order->getStatus())) {
            $order->setStatus(Order::STATE_NEW);
        }

        $this->getEntityManager()->persist($order);

        $this->getEntityManager()->flush();

        return $order;
    }
}
