<?php
// bootstrap.php
require_once __DIR__ . "/../../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// $paths = array("/path/to/entity-files");
// $isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'ascii',
    'enum'     =>  "string",
);

// $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
return $entityManager = EntityManager::create(
    $dbParams,
    Setup::createAnnotationMetadataConfiguration(
        [__DIR__ . "/../../src/Entity"], false, null, null, false
    )
);