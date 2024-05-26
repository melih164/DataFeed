<?php

namespace App\Infrastructure\ReadData;

use App\Domain\ItemCollection;
use App\Domain\Entity\Item;
use Exception;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use SimpleXMLElement;
use TypeError;

class ReadDataTransformer
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function rawXmlTransformer(SimpleXMLElement $rawItems): ItemCollection
    {
        $itemCollection = new ItemCollection();

        foreach ($rawItems as $rawItem) {
            try {
                $item = new Item(
                    empty($rawItem->entity_id) ? null : (int)$rawItem->entity_id,
                    (int)$rawItem->sku,
                    (string)$rawItem->name,
                    (string)$rawItem->CategoryName,
                    empty($rawItem->description) ? null : (string)$rawItem->description, //nullable
                    (string)$rawItem->shortdesc,
                    (float)$rawItem->price,
                    empty($rawItem->link) ? null :(string)$rawItem->link,
                    (string)$rawItem->image,
                    (string)$rawItem->Brand,
                    (int)$rawItem->rating,
                    (int)$rawItem->Count, //Count zero when it is null.
                    empty($rawItem->CaffeineType) ? null : (string)$rawItem->CaffeineType,  //nullable
                    empty($rawItem->Flavored) ? null : (string)$rawItem->Flavored,  //nullable
                    empty($rawItem->Seasonal) ? null : (string)$rawItem->Seasonal,  //nullable
                    (string)$rawItem->Instock,
                    (bool)$rawItem->Facebook,
                    (bool)$rawItem->IsKCup,
                );
                $itemCollection->add($item);
            } catch (Exception|TypeError|InvalidArgumentException $e) {
                $this->logger->error('While transforming, error occurred' . $e->getMessage(), ['exception' => $e]);
                echo 'While transforming, error occurred';
            }
        }

        return $itemCollection;
    }


}