<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use Carbon\Carbon;

class EstadoController extends Controller
{
    public function index()
    {
        $estados = Estado::all();
        return view('estados.index', compact('estados'));
    }

    public function create()
    {
        return view('estados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:45',
            'orden' => 'required|integer',
        ]);

        Estado::create($request->all());
        return redirect()->route('estados.index')
                         ->with('success', 'Estado creado exitosamente.');
    }

    public function show(Estado $estado)
    {
        return view('estados.show', compact('estado'));
    }

    public function edit(Estado $estado)
    {
        return view('estados.edit', compact('estado'));
    }

    public function update(Request $request, Estado $estado)
    {
        $request->validate([
            'nombre' => 'required|string|max:45',
            'orden' => 'required|integer',
        ]);

        $estado->update($request->all());
        return redirect()->route('estados.index')
                         ->with('success', 'Estado actualizado exitosamente.');
    }

    public function destroy(Estado $estado)
    {
        if ($estado->servicios->count() > 0  || $estado->detallesServicio->count() > 0){
            return redirect()->route('estados.index')
                             ->with('error', 'No se puede eliminar el estado porque tiene servicios asociados.');
        }

        $estado->update(['gc_record' => Carbon::now()->format('Ymd')]);

        return redirect()->route('estados.index')
                         ->with('success', 'Estado marcado como eliminado exitosamente.');
    }
}
