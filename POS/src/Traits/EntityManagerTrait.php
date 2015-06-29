<?php

namespace POS\Traits;

use Doctrine\ORM\EntityManager;

/**
 * EntityManagerTrait
 *
 * @package POS\Traits
 * @copyright 2015 Phil Thompson
 */
trait EntityManagerTrait
{
    /**
     * @var \Doctrine\ORM\EntityManager $entity_manager
     */
    protected $entity_manager;

    /**
     * setEntityManager
     *
     * @param \Doctrine\ORM\EntityManager $em
     * @return $this
     */
    public function setEntityManager(EntityManager $em)
    {
        $this->entity_manager = $em;

        return $this;
    }

    /**
     * getEntityManager
     *
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->entity_manager;
    }
}
