<?php

namespace POS\Model\Entity;

use POS\Model\EntityFactory;
use POS\Model\Type as EntityType;

/**
 * ItemFactory
 *
 * @package POS\Model\Entity
 * @copyright 2015 Phil Thompson
 */
class ItemFactory extends EntityFactory
{
    /**
     * @var \POS\Model\Entity\CategoryInterface $category
     */
    protected $category;

    /**
     * @var int $entity_type
     */
    protected $entity_type = EntityType::TYPE_ITEM;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var float $price
     */
    protected $price;

    /**
     * setCategory
     *
     * @param \POS\Model\Entity\CategoryInterface $category
     * @return $this
     */
    public function setCategory(CategoryInterface $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * getCategory
     *
     * @return \POS\Model\Entity\CategoryInterface
     */
    public function getCategory()
    {
        return $this->category;
    }

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
     * setPrice
     *
     * @param float $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * getPrice
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * fromArray
     *
     * @param array $data
     */
    public function fromArray(array $data)
    {
        parent::fromArray($data);

        if (isset($data['category'])) {
            if (is_numeric($data['category'])) {
                $category = $this->getEntityManager()->find('\POS\Model\Entity\Category', $data['category']);

                $this->setCategory($category);
            } else {
                $category = $this->getEntityManager()
                    ->getRepository('\POS\Model\Entity\Category')
                    ->findOneBy(
                        [
                            'name' => $data['category']
                        ]
                    );

                $this->setCategory($category);
            }
        }

        if (isset($data['name'])) {
            $this->setName($data['name']);
        }

        if (isset($data['price'])) {
            $this->setPrice($data['price']);
        }
    }

    /**
     * create
     *
     * @return \POS\Model\Entity\ItemInterface
     */
    public function create()
    {
        /** @var \POS\Model\Entity\ItemInterface $item */
        $item = parent::create();

        if (!is_null($this->getCategory())) {
            $item->setCategory($this->getCategory());
        }

        if (!is_null($this->getName())) {
            $item->setName($this->getName());
        }

        if (!is_null($this->getPrice())) {
            $item->setPrice($this->getPrice());
        }

        $this->getEntityManager()->persist($item);

        $this->getEntityManager()->flush();

        return $item;
    }
}
