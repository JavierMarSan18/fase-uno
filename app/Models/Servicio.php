<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ValidScope;

class Servicio extends Model
{
    use HasFactory;

    protected $primaryKey = 'servicio_id';

    protected $fillable = [
        'cliente_id', 
        'tecnico_id', 
        'equipo_id', 
        'estado_id', 
        'diagnostico', 
        'solucion', 
        'fecha_inicio', 
        'fecha_fin', 
        'gc_record'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new ValidScope);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class, 'tecnico_id');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function detallesServicio()
    {
        return $this->hasMany(DetalleServicio::class, 'servicio_id');
    }
}
