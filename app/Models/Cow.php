<?php

namespace App\Models;

class Cow extends Animal
{
    public string $species = 'Корова';
    public string $product = 'Молоко';

    public function collectProduct(): int
    {
        return rand(8,12);
    }
}
