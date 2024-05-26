<?php

namespace App\Domain;

interface ReadDataInterface
{
    public function getNormalizedData():ItemCollection;
}