<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Equipo;

class EquipoSeeder extends Seeder
{

    public function run(): void
    {
        $equipos = [
            ['marca_id' => 1, 'tipo_id' => 1, 'modelo' => 'iPhone 12'],
            ['marca_id' => 2, 'tipo_id' => 1, 'modelo' => 'Galaxy S21'],
            ['marca_id' => 3, 'tipo_id' => 1, 'modelo' => 'P40'],
            ['marca_id' => 4, 'tipo_id' => 1, 'modelo' => 'Mi 11'],
            ['marca_id' => 5, 'tipo_id' => 1, 'modelo' => 'Moto G9'],
            ['marca_id' => 6, 'tipo_id' => 1, 'modelo' => 'Xperia 1']
        ];

        foreach ($equipos as $equipo) {
            Equipo::create($equipo);
        }
    }
}
