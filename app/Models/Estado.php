<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ValidScope;

class Estado extends Model
{
    use HasFactory;

    protected $primaryKey = 'estado_id';

    protected $fillable = [
        'nombre', 
        'orden', 
        'gc_record'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new ValidScope);
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'estado_id');
    }

    public function detallesServicio()
    {
        return $this->hasMany(DetalleServicio::class, 'estado_id');
    }
}
