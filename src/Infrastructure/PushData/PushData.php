<?php

namespace App\Infrastructure\PushData;

use App\Domain\ItemCollection;
use App\Domain\PushDataInterface;
use App\Infrastructure\EntityManagerProvider;
use Doctrine\ORM\Exception\ORMException;
use Exception;
use Psr\Log\LoggerInterface;

class PushData implements PushDataInterface
{
    public function __construct(
        private EntityManagerProvider $entityManagerProvider,
        private LoggerInterface $logger
    ) {
    }

    public function pushData(ItemCollection $itemCollection): void
    {
        $em = $this->entityManagerProvider->getEntityManager();
        foreach ($itemCollection->getItemCollection() as $item) {
            try {
                $em->persist($item);
            } catch (Exception|ORMException $e) {
                $this->logger->error('while persisting data, error occurred' . $e->getMessage(), ['Exception' => $e]);
                echo 'while pushing data, error occurred';
            }
        }
        try {
            $em->flush();
            $em->clear();
        } catch (Exception|ORMException $e) {
            $this->logger->error('while flushing data, error occurred' . $e->getMessage(), ['Exception' => $e]);
            echo 'while pushing data, error occurred';
        }
    }
}