<?php

namespace App\Services;

use App\Models\Animal;

class FarmService
{
    protected array $animals = [];
    public array $products = [];
    public function addAnimal(Animal $animal): void
    {
        $this->animals[] = $animal;
    }

    public function countAnimals(): array
    {
        $animalsCount = [];
        foreach ($this->animals as $animal) {
            if(!isset($animalsCount[$animal->species])) {
                $animalsCount[$animal->species] = 0;
            }
            $animalsCount[$animal->species]++;
        }
        return $animalsCount;
    }

    public function collectAllProducts(): array
    {
        foreach ($this->animals as $animal) {
            if(!isset($this->products[$animal->product])) {
                $this->products[$animal->product] = 0;
            }
            $this->products[$animal->product] += $animal->collectProduct();
        }

        return $this->products;
    }
}
