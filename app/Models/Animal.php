<?php

namespace App\Models;

abstract class Animal
{
    public string $species;
    public string $product;
    abstract public function collectProduct();
}
