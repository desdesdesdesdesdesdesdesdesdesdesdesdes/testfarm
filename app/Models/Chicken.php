<?php

namespace App\Models;


class Chicken extends Animal
{
    public string $species = 'Курица';
    public string $product = 'Яйцо';

    public function collectProduct(): int
    {
        return rand(0,1);
    }
}
