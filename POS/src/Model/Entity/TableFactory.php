<?php

namespace POS\Model\Entity;

use POS\Model\EntityFactory;
use POS\Model\Type as EntityType;

/**
 * TableFactory
 *
 * @package POS\Model\Entity
 * @copyright 2015 Phil Thompson
 */
class TableFactory extends EntityFactory
{
    /**
     * @var int $entity_type
     */
    protected $entity_type = EntityType::TYPE_TABLE;

    /**
     * @var string $name
     */
    protected $name;

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
     * fromArray
     *
     * @param array $data
     */
    public function fromArray(array $data)
    {
        parent::fromArray($data);

        if (isset($data['name'])) {
            $this->setName($data['name']);
        }
    }

    /**
     * create
     *
     * @return \POS\Model\Entity\TableInterface
     */
    public function create()
    {
        /** @var \POS\Model\Entity\TableInterface $table */
        $table = parent::create();

        if (!is_null($this->getName())) {
            $table->setName($this->getName());
        }

        $this->getEntityManager()->persist($table);

        $this->getEntityManager()->flush();

        return $table;
    }
}
