<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $primaryKey = 'marca_id';

    protected $fillable = [
        'nombre', 
        'gc_record'
    ];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'marca_id');
    }
}
