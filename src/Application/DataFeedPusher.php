<?php

namespace App\Application;

use App\Domain\PushDataInterface;
use App\Domain\ReadDataInterface;

class DataFeedPusher
{
    public function __construct(
        public ReadDataInterface $readData,
        public PushDataInterface $pushData
    )
    {
    }
    public function readAndPushData():void
    {
        //Read Data
       $normalizedData = $this->readData->getNormalizedData();

        //Push Data
       $this->pushData->pushData($normalizedData);
    }
}