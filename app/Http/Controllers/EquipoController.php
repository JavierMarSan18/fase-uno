<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Tipo;
use App\Models\Marca;
use Carbon\Carbon;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::all();
        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        $tipos = Tipo::all();
        $marcas = Marca::all();
        return view('equipos.create', compact('tipos', 'marcas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required|string|max:100',
            'tipo_id' => 'required|exists:tipos,tipo_id',
            'marca_id' => 'required|exists:marcas,marca_id',
        ]);

        Equipo::create($request->all());
        return redirect()->route('equipos.index')
                         ->with('success', 'Equipo creado exitosamente.');
    }

    public function show(Equipo $equipo)
    {
        return view('equipos.show', compact('equipo'));
    }

    public function edit(Equipo $equipo)
    {
        $tipos = Tipo::all();
        $marcas = Marca::all();
        return view('equipos.edit', compact('equipo', 'tipos', 'marcas'));
    }

    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'modelo' => 'required|string|max:100',
            'tipo_id' => 'required|exists:tipos,tipo_id',
            'marca_id' => 'required|exists:marcas,marca_id',
        ]);

        $equipo->update($request->all());
        return redirect()->route('equipos.index')
                         ->with('success', 'Equipo actualizado exitosamente.');
    }

    public function destroy(Equipo $equipo)
    {
        $equipo->update(['gc_record' => Carbon::now()->format('Ymd')]);

        return redirect()->route('equipos.index')
                         ->with('success', 'Equipo marcado como eliminado exitosamente.');
    }
}
