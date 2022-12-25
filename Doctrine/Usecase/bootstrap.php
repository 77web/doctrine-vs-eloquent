<?php

declare(strict_types=1);

use Doctrine\Common\EventManager;
use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Gedmo\SoftDeleteable\Filter\SoftDeleteableFilter;
use Gedmo\SoftDeleteable\SoftDeleteableListener;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\Cache\Adapter\ArrayAdapter;

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: array(__DIR__."/../Entity"),
    isDevMode: true,
    cache: new ArrayAdapter(),
);
$config->setMiddlewares([
    new Middleware(new Logger('doctrine', [new StreamHandler('php://stdout')])),
]);
$conn = [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/../db.sqlite',
];

$eventManager = new EventManager();
$softDeletable = new SoftDeleteableListener();
$eventManager->addEventSubscriber($softDeletable);

$em = EntityManager::create($conn, $config, $eventManager);
$config->addFilter('soft-deletable', new SoftDeleteableFilter($em));

return $em;

