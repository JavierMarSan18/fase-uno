<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    use HasFactory;

    protected $primaryKey = 'tipo_equipo_id';

    protected $table = 'tipos_equipo';

    protected $fillable = [
        'nombre', 
        'gc_record'
    ];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'tipo_equipo_id');
    }
}
