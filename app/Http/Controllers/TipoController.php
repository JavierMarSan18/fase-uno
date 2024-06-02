<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use Carbon\Carbon;

class TipoController extends Controller
{
    // Mostrar una lista de todos los recursos
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipos.index', compact('tipos'));
    }

    // Mostrar el formulario para crear un nuevo recurso
    public function create()
    {
        return view('tipos.create');
    }

    // Almacenar un nuevo recurso en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            // Agrega más validaciones según sea necesario
        ]);

        Tipo::create($request->all());
        return redirect()->route('tipos.index')
                         ->with('success', 'Tipo de equipo creado exitosamente.');
    }

    // Mostrar un recurso específico
    public function show(Tipo $tipo)
    {
        return view('tipos.show', compact('tipo'));
    }

    // Mostrar el formulario para editar un recurso específico
    public function edit(Tipo $tipo)
    {
        return view('tipos.edit', compact('tipo'));
    }

    // Actualizar un recurso específico en la base de datos
    public function update(Request $request, Tipo $tipo)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            // Agrega más validaciones según sea necesario
        ]);
        
        $tipo->update($request->all());
        return redirect()->route('tipos.index')
                         ->with('success', 'Tipo de equipo actualizado exitosamente.');
    }

    // Eliminar un recurso específico de la base de datos
    public function destroy(Tipo $tipo)
    {
        if ($tipo->equipos()->exists()) {
            return redirect()->route('tipos.index')
                             ->with('error', 'No se puede eliminar el tipo de equipo porque está asociado a un equipo.');
        }

        $tipo->update(['gc_record' => Carbon::now()->format('Ymd')]);

        return redirect()->route('tipos.index')
                         ->with('success', 'Tipo de equipo marcado como eliminado exitosamente.');
    }
}
