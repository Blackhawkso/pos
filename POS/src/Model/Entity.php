<?php

namespace POS\Model;

/**
 * Entity
 *
 * @package POS\Model
 * @copyright 2015 Phil Thompson
 */
class Entity implements EntityInterface
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var \POS\Model\TypeInterface $entity_type
     */
    protected $entity_type;

    /**
     * @var null $type
     */
    protected $type = null;

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
     * setEntityType
     *
     * @param \POS\Model\TypeInterface $entity_type
     * @return $this
     */
    public function setEntityType(TypeInterface $entity_type)
    {
        $this->entity_type = $entity_type;

        return $this;
    }

    /**
     * getEntityType
     *
     * @return \POS\Model\TypeInterface
     */
    public function getEntityType()
    {
        return $this->entity_type;
    }
}
