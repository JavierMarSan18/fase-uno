<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{

    public function run(): void
    {
        $clientes = [
           [ 'persona_id' => 1],
           [ 'persona_id' => 2],
           [ 'persona_id' => 3],
        ];

        foreach ($clientes as $cliente) {
            Cliente::create($cliente);
        }
    }
}
