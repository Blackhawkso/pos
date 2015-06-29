<?php
namespace POS\Model;

use Doctrine\Common\Collections\Collection;


/**
 * Type
 *
 * @package POS\Model
 * @copyright 2015 Phil Thompson
 */
interface TypeInterface
{
    /**
     * setId
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * getId
     *
     * @return int
     */
    public function getId();

    /**
     * setEntities
     *
     * @param \Doctrine\Common\Collections\Collection $entities
     * @return $this
     */
    public function setEntities(Collection $entities);

    /**
     * getEntities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEntities();

    /**
     * setLabel
     *
     * @param string $label
     * @return $this
     */
    public function setLabel($label);

    /**
     * getLabel
     *
     * @return string
     */
    public function getLabel();
}
