<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use Carbon\Carbon;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return view('marcas.index', compact('marcas'));
    }

    public function create()
    {
        return view('marcas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:45',
        ]);

        Marca::create($request->all());
        return redirect()->route('marcas.index')
                         ->with('success', 'Marca creada exitosamente.');
    }

    public function show(Marca $marca)
    {
        return view('marcas.show', compact('marca'));
    }

    public function edit(Marca $marca)
    {
        return view('marcas.edit', compact('marca'));
    }

    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nombre' => 'required|string|max:45',
        ]);

        $marca->update($request->all());
        return redirect()->route('marcas.index')
                         ->with('success', 'Marca actualizada exitosamente.');
    }

    public function destroy(Marca $marca)
    {
        if ($marca->equipos()->exists()) {
            return redirect()->route('marcas.index')
                             ->with('error', 'No se puede eliminar la marca porque está asociada a un equipo.');
        }

        $marca->gc_record = Carbon::now()->format('Ymd');
        $marca->save();
        return redirect()->route('marcas.index')
                         ->with('success', 'Marca eliminada exitosamente.');
    }
}
