<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\Tecnico;
use App\Models\Equipo;
use App\Models\Estado;
use App\Models\DetalleServicio;
use Carbon\Carbon;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios.index', compact('servicios'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $tecnicos = Tecnico::all();
        $equipos = Equipo::all();
        $estados = Estado::all();
        return view('servicios.create', compact('clientes', 'tecnicos', 'equipos', 'estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,cliente_id',
            'tecnico_id' => 'required|exists:tecnicos,tecnico_id',
            'equipo_id' => 'required|exists:equipos,equipo_id',
            'diagnostico' => 'required|string|max:255',
        ]);

        $estadoInicial = Estado::orderBy('orden')->first();
        
        $servicio = Servicio::create(
            $request->all() + [
                'fecha_inicio' => Carbon::now(), 
                'estado_id' => $estadoInicial->estado_id]
        );

        $detalle = DetalleServicio::create([
            'servicio_id' => $servicio->servicio_id,
            'observaciones' => 'Inicio del servicio',
            'fecha_inicio' => null,
            'estado_id' => $estadoInicial->estado_id + 1,
            'orden' => 1
        ]);

        return redirect()->route('servicios.index')
                         ->with('success', 'Servicio creado exitosamente.');
    }

    public function show(Servicio $servicio)
    {
        $detalles = $servicio->detallesServicio()->orderBy('created_at')->get();
        return view('servicios.show', compact('servicio', 'detalles'));
    }

    public function edit(Servicio $servicio)
    {
        $clientes = Cliente::all();
        $tecnicos = Tecnico::all();
        $equipos = Equipo::all();
        return view('servicios.edit', compact('servicio', 'clientes', 'tecnicos', 'equipos'));
    }

    public function update(Request $request, Servicio $servicio)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,cliente_id',
            'tecnico_id' => 'required|exists:tecnicos,tecnico_id',
            'equipo_id' => 'required|exists:equipos,equipo_id',
            'diagnostico' => 'required|string|max:255',
        ]);

        $servicio->update($request->all());
        return redirect()->route('servicios.index')
                         ->with('success', 'Servicio actualizado exitosamente.');
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->update(['gc_record' => Carbon::now()->format('Ymd')]);

        return redirect()->route('servicios.index')
                         ->with('success', 'Servicio marcado como eliminado exitosamente.');
    }

    public function startDetalle(DetalleServicio $detalle)
    {
        $detalle->update(['fecha_inicio' => Carbon::now()]);

        $servicio = $detalle->servicio;
        $estadoSiguiente = Estado::where('orden', '>', $detalle->estado->orden)
                                ->orderBy('orden')
                                ->first();
         $servicio->update(['estado_id' => $detalle->estado_id]);
        return back()->with('success', 'Detalle del servicio iniciado y siguiente detalle creado.');
    }

    public function endDetalle(DetalleServicio $detalle)
    {
        $servicio = $detalle->servicio;
        $estadoSiguiente = Estado::where('orden', '>', $detalle->estado->orden)
                                ->orderBy('orden')
                                ->first();
        
        
        $detalle->update(['fecha_fin' => Carbon::now()]);
        $ultimoEstado = Estado::orderBy('orden', 'desc')->first();
        if ($detalle->estado_id == $ultimoEstado->estado_id) {
            $servicio->update(['fecha_fin' => Carbon::now()]);
        }

        if ($estadoSiguiente) {
            DetalleServicio::create([
                'servicio_id' => $servicio->servicio_id,
                'estado_id' => $estadoSiguiente->estado_id,
                'fecha_inicio' => null,
                'fecha_fin' => null,
                'observaciones' => 'Inicio de fase de ' . $estadoSiguiente->nombre,
                'orden' => $detalle->orden + 1,
            ]);

        }

        return back()->with('success', 'Detalle del servicio finalizado.');
    }
}
