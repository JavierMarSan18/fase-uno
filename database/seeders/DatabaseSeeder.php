<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        $this->call(EstadoSeeder::class);
        $this->call(PersonaSeeder::class);
        $this->call(TecnicoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(EquipoSeeder::class);
    }
}
