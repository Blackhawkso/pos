<?php

namespace POS\Model;

/**
 * Entity
 *
 * @package POS\Model
 * @copyright 2015 Phil Thompson
 */
interface EntityInterface
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
     * setEntityType
     *
     * @param \POS\Model\TypeInterface $entity_type
     * @return $this
     */
    public function setEntityType(TypeInterface $entity_type);

    /**
     * getEntityType
     *
     * @return \POS\Model\TypeInterface
     */
    public function getEntityType();
}
