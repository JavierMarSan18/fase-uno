<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleServicio extends Model
{
    use HasFactory;

    protected $primaryKey = 'detalle_servicio_id';

    protected $table = 'detalles_servicio';

    protected $fillable = [
        'servicio_id', 
        'estado_id', 
        'fecha_inicio', 
        'fecha_fin', 
        'observaciones', 
        'gc_record'
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }
}
