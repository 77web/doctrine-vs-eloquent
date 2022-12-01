<?php

declare(strict_types=1);

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Cache\Adapter\ArrayAdapter;

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: array(__DIR__."/../Entity"),
    isDevMode: true,
    cache: new ArrayAdapter(),
);
$conn = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/../db.sqlite',
);

return EntityManager::create($conn, $config);
