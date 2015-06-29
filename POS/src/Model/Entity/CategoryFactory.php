<?php

namespace POS\Model\Entity;

use POS\Model\EntityFactory;
use POS\Model\Type as EntityType;

/**
 * CategoryFactory
 *
 * @package POS\Model\Entity
 * @copyright 2015 Phil Thompson
 */
class CategoryFactory extends EntityFactory
{
    /**
     * @var int $entity_type
     */
    protected $entity_type = EntityType::TYPE_CATEGORY;

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
     * @return \POS\Model\Entity\CategoryInterface
     */
    public function create()
    {
        /** @var \POS\Model\Entity\CategoryInterface $category */
        $category = parent::create();

        if (!is_null($this->getName())) {
            $category->setName($this->getName());
        }

        $this->getEntityManager()->persist($category);

        $this->getEntityManager()->flush();

        return $category;
    }
}
