<?php

namespace POS\Model;

use Exception;
use POS\Traits\EntityManagerTrait;

/**
 * EntityFactory
 *
 * @package POS\Model
 * @copyright 2015 Phil Thompson
 */
class EntityFactory
{
    use EntityManagerTrait;

    /**
     * @var null $entity_type
     */
    protected $entity_type = null;

    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var \POS\Model\EntityInterface $instance
     */
    protected $instance;

    /**
     * @var \POS\Model\EntityInterface $prototype
     */
    protected $prototype;

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
     * setInstance
     *
     * @param \POS\Model\EntityInterface $instance
     * @return $this
     */
    public function setInstance(EntityInterface $instance)
    {
        $this->instance = $instance;

        return $this;
    }

    /**
     * getInstance
     *
     * @return \POS\Model\EntityInterface
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * setPrototype
     *
     * @param \POS\Model\EntityInterface $prototype
     * @return $this
     */
    public function setPrototype(EntityInterface $prototype)
    {
        $this->prototype = $prototype;

        return $this;
    }

    /**
     * getPrototype
     *
     * @return \POS\Model\EntityInterface
     */
    public function getPrototype()
    {
        return $this->prototype;
    }

    /**
     * fromArray
     *
     * @param array $data
     */
    public function fromArray(array $data)
    {
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
    }

    /**
     * create
     *
     * @return \POS\Model\EntityInterface
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     * @throws \Exception
     */
    public function create()
    {
        if (!is_null($this->getId())) {
            $entity = $this->getEntityManager()->find('\POS\Model\Entity', $this->getId());
            if (!is_null($entity)) {
                return $entity;
            }
        } else {
            if (!is_null($this->getInstance())) {
                return $this->getInstance();
            } else {
                if (!is_null($this->entity_type)) {
                    $entity_type = $this->getEntityManager()->find('\POS\Model\Type', $this->entity_type);

                    $this->getPrototype()->setEntityType($entity_type);

                    return $this->getPrototype();
                }
            }
        }

        throw new Exception("Can't create entity");
    }
}
