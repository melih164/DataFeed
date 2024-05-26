<?php

namespace App\Infrastructure\ReadData;

use App\Domain\ItemCollection;
use App\Domain\ReadDataInterface;

class ReadData implements ReadDataInterface
{
    public function __construct(public ReadDataTransformer $readDataTransformer)
    {
    }
    public function getNormalizedData(): ItemCollection {

        //Raw Data
        $rawXml = simplexml_load_string(file_get_contents(__DIR__ . '/feed.xml'));

        //Return normalized data
        return $this->readDataTransformer->rawXmlTransformer($rawXml);
    }
}