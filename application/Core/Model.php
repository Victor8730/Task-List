<?php

declare(strict_types=1);

namespace Core;

use application\Config as Config;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * Model for creating connections and other methods
 * such as creating, modifying, deleting records from the database
 * @package Core
 */
class Model extends Config
{
    public object $entityManager;

    /**
     * Model constructor.
     * Inherited configuration object, get the necessary parameters
     * Making the initial setup for working with the Doctrine ORM
     */
    public function __construct()
    {
        parent::__construct();
        $config = Setup::createAnnotationMetadataConfiguration($this->paths, $this->isDevMode);

        try {
            $this->entityManager = EntityManager::create($this->dbParams, $config);
            try {
                $this->entityManager->getConnection()->connect();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } catch (ORMException $e) {
            echo $e->getMessage();
        }
    }

    public function __toString()
    {
        return '';
    }

    /**
     * Set parameter object
     * @param object $object
     * @param array $params
     * @return object
     */
    public function setParameters(object $object, array $params): object
    {
        foreach ($params as $k => $p) {
            $key = lcfirst(str_replace([' ', '_', '-'], '', ucwords($k, ' _-')));
            if (property_exists($object, $key)) {
                $object->{'set' . ucfirst($key)}($p);
            }
        }

        return $object;
    }

    /**
     * Get parameter by object
     * @param object $object
     * @param array $params
     * @return array
     */
    public function getParameters(object $object, array $params): array
    {
        $result = [];
        foreach ($params as $param) {
            if (property_exists($object, $param)) {
                $result[$param] = $object->{'get' . ucfirst($param)}();
            }
        }

        return $result;
    }
}