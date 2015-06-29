<?php

namespace POS\Model\Entity;

use DateTime;
use POS\Model\Entity;
use POS\Model\Type as EntityType;

/**
 * Order
 *
 * @package POS\Model\Entity
 * @copyright 2015 Phil Thompson
 */
class Order extends Entity implements OrderInterface
{
    const STATE_NEW = 0;
    const STATE_NEW_LABEL = 'New';
    const STATE_UNPAID = 1;
    const STATE_UNPAID_LABEL = 'Unpaid';
    const STATE_LOCKED = 2;
    const STATE_LOCKED_LABEL = 'Locked';
    const STATE_CLOSED = 3;
    const STATE_CLOSED_LABEL = 'Closed';

    /**
     * @var int $status
     */
    protected $status;

    /**
     * @var array $state_label
     */
    protected $state_label = [
        self::STATE_NEW => self::STATE_NEW_LABEL,
        self::STATE_UNPAID => self::STATE_UNPAID_LABEL,
        self::STATE_LOCKED => self::STATE_LOCKED_LABEL,
        self::STATE_CLOSED => self::STATE_CLOSED_LABEL,
    ];

    /**
     * @var \POS\Model\Entity\TableInterface $table
     */
    protected $table;

    /**
     * @var \DateTime $time
     */
    protected $time;

    /**
     * @var int $type
     */
    protected $type = EntityType::TYPE_ORDER;

    /**
     * setStatus
     *
     * @param int $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * getStatus
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * getStateLabel
     *
     * @return string
     */
    public function getStateLabel()
    {
        return $this->state_label[$this->getStatus()];
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
     * isOpen
     *
     * @return bool
     */
    public function isOpen()
    {
        return $this->getStatus() == self::STATE_NEW;
    }

    /**
     * isLocked
     *
     * @return bool
     */
    public function isLocked()
    {
        return $this->getStatus() == self::STATE_LOCKED || $this->getStatus() == self::STATE_UNPAID;
    }

    /**
     * isClosed
     *
     * @return bool
     */
    public function isClosed()
    {
        return $this->getStatus() == self::STATE_CLOSED;
    }
}
