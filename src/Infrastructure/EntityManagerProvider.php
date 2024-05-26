<?php

namespace App\Infrastructure;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerProvider
{
    public function getEntityManager() {

        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: array(__DIR__."/../../src/Domain/Entity"),
            isDevMode: true,
        );

        $connection = DriverManager::getConnection([
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite',
        ], $config);

        return new EntityManager($connection, $config);
    }
}