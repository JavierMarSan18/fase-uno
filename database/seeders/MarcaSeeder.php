<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcaSeeder extends Seeder
{
    public function run(): void
    {
        $marcas = [
            ['nombre' => 'Apple'],
            ['nombre' => 'Samsung'],
            ['nombre' => 'Huawei'],
            ['nombre' => 'Xiaomi'],
            ['nombre' => 'Motorola'],
            ['nombre' => 'Sony']
        ];

        foreach ($marcas as $marca) {
            Marca::create($marca);
        }
    }
}
