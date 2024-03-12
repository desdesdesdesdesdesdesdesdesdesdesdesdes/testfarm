<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FarmService;
use App\Models\Chicken;
use App\Models\Cow;

class FarmLife extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'farm:life';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Execute the console command.
     */
    public function handle(FarmService $farmService)
    {
        for ($i = 1; $i <= 10; $i++) {
            $farmService->addAnimal(new Cow($i));
        }

        for ($i = 1; $i <= 20; $i++) {
            $farmService->addAnimal(new Chicken($i));
        }

        $countedAnimals = $farmService->countAnimals();
        $this->sendToConsole('Животные на ферме', $countedAnimals);


        for ($i = 1; $i <= 7; $i++) {
            $products = $farmService->collectAllProducts();
        }
        $this->sendToConsole('Собрано продукции', $products);


        for ($i = 1; $i <= 5; $i++) {
            $farmService->addAnimal(new Chicken($i));
        }
        $farmService->addAnimal(new Cow($i));

        $countedAnimals = $farmService->countAnimals();
        $this->sendToConsole('Животные на ферме', $countedAnimals);

        for ($i = 1; $i <= 7; $i++) {
            $products = $farmService->collectAllProducts();
        }
        $this->sendToConsole('Собрано продукции', $products);

    }

    protected function sendToConsole(string $title, array $data):void
    {
        $this->info($title);
        foreach ($data as $key=>$value) {
            $this->info($key .': '. $value);
        }
        $this->newLine();
    }
}
