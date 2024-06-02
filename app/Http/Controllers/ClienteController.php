<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Persona;
use Carbon\Carbon;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'primer_nombre' => 'required',
            'primer_apellido' => 'required',
            // Agrega más validaciones según sea necesario
        ]);

        $persona = Persona::create($request->all());

        Cliente::create([
            'persona_id' => $persona->persona_id,
            'gc_record' => null, // Inicializa con null o según sea necesario
        ]);

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente creado exitosamente.');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'primer_nombre' => 'required',
            'primer_apellido' => 'required',
            // Agrega más validaciones según sea necesario
        ]);

        $cliente->persona->update($request->all());

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->gc_record = Carbon::now()->format('Ymd'); // Actualizar gc_record con la fecha actual
        $cliente->save();

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente marcado como eliminado exitosamente.');
    }
}
