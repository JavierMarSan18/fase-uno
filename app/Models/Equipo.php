<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $primaryKey = 'equipo_id';

    protected $fillable = [
        'marca_id', 
        'tipo_id', 
        'modelo', 
        'gc_record'
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'equipo_id');
    }
}
