<?php

namespace POS\Model\Entity;

use DateTime;
use Doctrine\Common\Collections\Collection;
use POS\Model\EntityInterface;

/**
 * Order
 *
 * @package POS\Model\Entity
 * @copyright 2015 Phil Thompson
 */
interface OrderInterface extends EntityInterface
{
    /**
     * setStatus
     *
     * @param int $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * getStatus
     *
     * @return int
     */
    public function getStatus();

    /**
     * getStateLabel
     *
     * @return string
     */
    public function getStateLabel();

    /**
     * setTable
     *
     * @param \POS\Model\Entity\TableInterface $table
     * @return $this
     */
    public function setTable(TableInterface $table);

    /**
     * getTable
     *
     * @return \POS\Model\Entity\TableInterface
     */
    public function getTable();

    /**
     * setTime
     *
     * @param \DateTime $time
     * @return $this
     */
    public function setTime(DateTime $time);

    /**
     * getTime
     *
     * @return \DateTime
     */
    public function getTime();

    /**
     * isOpen
     *
     * @return bool
     */
    public function isOpen();

    /**
     * isLocked
     *
     * @return bool
     */
    public function isLocked();

    /**
     * isClosed
     *
     * @return bool
     */
    public function isClosed();
}
