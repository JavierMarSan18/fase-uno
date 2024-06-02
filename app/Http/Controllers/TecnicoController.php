<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Tecnico;
use App\Models\Persona;

class TecnicoController extends Controller
{
    public function index()
    {
        $tecnicos = Tecnico::all();
        return view('tecnicos.index', compact('tecnicos'));
    }

    public function create()
    {
        return view('tecnicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'primer_nombre' => 'required',
            'primer_apellido' => 'required',
        ]);

        $persona = Persona::create($request->all());

        Tecnico::create([
            'persona_id' => $persona->persona_id,
            'gc_record' => null,
        ]);

        return redirect()->route('tecnicos.index')
                         ->with('success', 'Técnico creado exitosamente.');
    }

    public function show(Tecnico $tecnico)
    {
        return view('tecnicos.show', compact('tecnico'));
    }

    public function edit(Tecnico $tecnico)
    {
        return view('tecnicos.edit', compact('tecnico'));
    }

    public function update(Request $request, Tecnico $tecnico)
    {
        $request->validate([
            'primer_nombre' => 'required',
            'primer_apellido' => 'required'
        ]);

        $tecnico->persona->update($request->all());

        return redirect()->route('tecnicos.index')
                         ->with('success', 'Técnico actualizado exitosamente.');
    }

    public function destroy(Tecnico $tecnico)
    {
        $tecnico->gc_record = Carbon::now()->format('Ymd');
        $tecnico->save();

        return redirect()->route('tecnicos.index')
                         ->with('success', 'Técnico marcado como eliminado exitosamente.');
    }
}
