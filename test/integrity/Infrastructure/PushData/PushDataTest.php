<?php

namespace integrity\Infrastructure\PushData;

use App\Infrastructure\EntityManagerProvider;
use App\Infrastructure\PushData\PushData;
use App\Infrastructure\ReadData\ReadDataTransformer;
use Doctrine\ORM\EntityManager;
use Exception;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;


class PushDataTest extends TestCase
{
    public function testPushData(): void
    {
        $entityManager = $this->createMock(EntityManager::class);
        $logger = $this->createMock(LoggerInterface::class);
        $entityManagerProvider = $this->createMock(EntityManagerProvider::class);

        $itemCollection = (new ReadDataTransformer($logger))->rawXmlTransformer(
            simplexml_load_string(file_get_contents(__DIR__ . '/../fixture/test.xml'))
        );
        $entityManagerProvider->method('getEntityManager')->willReturn($entityManager);

        $entityManager->expects($this->exactly(4))
            ->method('persist');

        $entityManager->expects($this->exactly(1))
            ->method('flush');
        $entityManager->expects($this->exactly(1))
            ->method('clear');

        $pushData = new PushData($entityManagerProvider, $logger);
        $pushData->pushData($itemCollection);
    }

    public function testPushDataWithPersistFail(): void
    {
        $entityManager = $this->createMock(EntityManager::class);
        $logger = $this->createMock(LoggerInterface::class);
        $entityManagerProvider = $this->createMock(EntityManagerProvider::class);

        $itemCollection = (new ReadDataTransformer($logger))->rawXmlTransformer(
            simplexml_load_string(file_get_contents(__DIR__ . '/../fixture/test.xml'))
        );
        $entityManagerProvider->method('getEntityManager')->willReturn($entityManager);

        $entityManager->expects($this->exactly(4))
            ->method('persist')
            ->willThrowException(new Exception());

        $logger->expects($this->exactly(4))
            ->method('error')
            ->with(
                $this->stringContains('while persisting data, error occurred'),
                $this->arrayHasKey('Exception')
            );

        $entityManager->expects($this->exactly(1))
            ->method('flush');
        $entityManager->expects($this->exactly(1))
            ->method('clear');

        $pushData = new PushData($entityManagerProvider, $logger);
        $pushData->pushData($itemCollection);
    }
}