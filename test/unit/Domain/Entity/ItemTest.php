<?php

namespace unit\Domain\Entity;

use App\Domain\Entity\Item;
use PHPUnit\Framework\TestCase;
use TypeError;

class ItemTest extends TestCase
{
    public function testItem(): void
    {
        $sot = new Item(
            123,
            123,
            'Coffee',
            'Bean',
            null,
            'delicious and tasty',
            13.13,
            'www.coffeetime.com',
            'www.coffeepictures.com',
            'Mr.CoffeeBean',
            4,
            34,
            null,
            null,
            null,
            'Yes',
            true,
            true
        );

        $this->assertSame(123, $sot->getEntityId());
        $this->assertSame(123, $sot->getSku());
        $this->assertSame('Coffee', $sot->getName());
        $this->assertSame('Bean', $sot->getCategoryName());
        $this->assertNull($sot->getDescription());
        $this->assertSame('delicious and tasty', $sot->getShortDescription());
        $this->assertSame(13.13, $sot->getPrice());
        $this->assertSame('www.coffeetime.com', $sot->getLink());
        $this->assertSame('www.coffeepictures.com', $sot->getImage());
        $this->assertSame('Mr.CoffeeBean', $sot->getBrand());
        $this->assertSame(4, $sot->getRating());
        $this->assertNull($sot->getCaffeineType());
        $this->assertNull($sot->getFlavored());
        $this->assertNull($sot->getSeasonal());
        $this->assertSame('Yes', $sot->getInStock());
        $this->assertTrue($sot->isFacebook());
        $this->assertTrue($sot->isKCup());
    }

    public function testItemWithTypeError(): void
    {
        $this->expectException(TypeError::class);
        $sot = new Item(
            'hello , i am wrong here',
            123,
            'Coffee',
            'Bean',
            null,
            'delicious and tasty',
            13.13,
            'www.coffeetime.com',
            'www.coffeepictures.com',
            'Mr.CoffeeBean',
            4,
            34,
            null,
            null,
            null,
            'Yes',
            true,
            true
        );

    }
}