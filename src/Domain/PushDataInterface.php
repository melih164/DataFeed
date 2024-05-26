<?php

namespace App\Domain;

use Exception;

interface PushDataInterface
{
    public function pushData(ItemCollection $itemCollection):void ;
}