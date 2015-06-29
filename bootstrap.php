<?php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createYAMLMetadataConfiguration([__DIR__."/config/dcm"], $isDevMode);

$dbParams = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => 'password',
    'dbname' => 'pos'
];

$entityManager = EntityManager::create($dbParams, $config);
