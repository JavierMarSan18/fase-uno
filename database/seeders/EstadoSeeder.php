<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    public function run()
    {
        $estados = [
            ['nombre' => 'Pendiente', 'orden' => 0],
            ['nombre' => 'Recibido', 'orden' => 1],
            ['nombre' => 'Reparado', 'orden' => 2],
            ['nombre' => 'Finalizado', 'orden' => 3],
            ['nombre' => 'Entregado', 'orden' => 4],
        ];

        foreach ($estados as $estado) {
            Estado::create($estado);
        }
    }
}
