<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Carbon\Carbon;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'primer_nombre' => 'required',
            'primer_apellido' => 'required',
        ]);

        Persona::create($request->all());
        return redirect()->route('personas.index')
                         ->with('success', 'Persona creada exitosamente.');
    }

    public function show(Persona $persona)
    {
        return view('personas.show', compact('persona'));
    }

    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'primer_nombre' => 'required',
            'primer_apellido' => 'required',
        ]);

        $persona->update($request->all());
        return redirect()->route('personas.index')
                         ->with('success', 'Persona actualizada exitosamente.');
    }

    public function destroy(Persona $persona)
    {
        if ($persona->clientes()->exists() || $persona->tecnicos()->exists()) {
            return redirect()->route('personas.index')
                             ->with('error', 'No se puede eliminar la persona porque está asociada a un cliente o técnico.');
        }

        $persona->gc_record = Carbon::now()->format('Ymd');
        $persona->save();
        return redirect()->route('personas.index')
                         ->with('success', 'Persona eliminada exitosamente.');
    }
}
