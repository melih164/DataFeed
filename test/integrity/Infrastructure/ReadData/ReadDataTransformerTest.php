<?php

namespace integrity\Infrastructure\ReadData;

require_once __DIR__ . '/../../../../vendor/autoload.php';

use App\Domain\Entity\Item;
use App\Domain\ItemCollection;
use App\Infrastructure\ReadData\ReadDataTransformer;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ReadDataTransformerTest extends TestCase
{
    public function testReadDataTransformer():void {

        $loggerMock = $this->createMock(LoggerInterface::class);
        $rawXml = simplexml_load_string(file_get_contents(__DIR__ . '/../fixture/test.xml'));

        $sot = new ReadDataTransformer($loggerMock);
        $itemCollection = $sot->rawXmlTransformer($rawXml);

        $this->assertCount(4, $itemCollection->getItemCollection());
        $this->assertInstanceOf(ItemCollection::class, $itemCollection);
        $this->assertInstanceOf(Item::class, $itemCollection->getItemCollection()[0]);
        $this->assertSame(340, $itemCollection->getItemCollection()[0]->getEntityId());
        $this->assertNull($itemCollection->getItemCollection()[0]->getDescription());
        $this->assertSame(342, $itemCollection->getItemCollection()[1]->getEntityId());
        $this->assertSame(343, $itemCollection->getItemCollection()[2]->getEntityId());
        $this->assertSame(344, $itemCollection->getItemCollection()[3]->getEntityId());
    }

    public function testReadDataTransformerWithFalseInfo():void {

        $loggerMock = $this->createMock(LoggerInterface::class);
        $rawXml = simplexml_load_string(file_get_contents(__DIR__ . '/../fixture/test_with_false_info.xml'));

        $sot = new ReadDataTransformer($loggerMock);
        $itemCollection = $sot->rawXmlTransformer($rawXml);

        $this->assertCount(2, $itemCollection->getItemCollection());
        $this->assertInstanceOf(ItemCollection::class, $itemCollection);
        $this->assertInstanceOf(Item::class, $itemCollection->getItemCollection()[0]);
    }
}