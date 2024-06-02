<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Persona;

class PersonaSeeder extends Seeder
{
    public function run(): void
    {
        $personas = [
            ['primer_nombre' => 'Juan', 'segundo_nombre' => 'Carlos', 'primer_apellido' => 'Pérez', 'segundo_apellido' => 'Gómez' ],
            ['primer_nombre' => 'María', 'segundo_nombre' => 'Isabel', 'primer_apellido' => 'García', 'segundo_apellido' => 'López' ],
            ['primer_nombre' => 'José', 'segundo_nombre' => 'Luis', 'primer_apellido' => 'Martínez', 'segundo_apellido' => 'González' ],
            ['primer_nombre' => 'Ana', 'segundo_nombre' => 'María', 'primer_apellido' => 'Hernández', 'segundo_apellido' => 'Pérez' ],
            ['primer_nombre' => 'Pedro', 'segundo_nombre' => 'Antonio', 'primer_apellido' => 'Gómez', 'segundo_apellido' => 'Martínez' ],
        ];

        foreach ($personas as $persona) {
            Persona::create($persona);
        }
    }
}
