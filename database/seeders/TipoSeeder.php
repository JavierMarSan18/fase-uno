<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipo;

class TipoSeeder extends Seeder
{

    public function run(): void
    {
        $tipos = [
            ['nombre' => 'Celular'],
            ['nombre' => 'Tablet'],
            ['nombre' => 'Notebook'],
            ['nombre' => 'PC'],
            ['nombre' => 'Impresora'],
            ['nombre' => 'Consola']
        ];

        foreach ($tipos as $tipo) {
            Tipo::create($tipo);
        }   
    }
}
