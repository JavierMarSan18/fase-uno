<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ValidScope;

class Tipo extends Model
{
    use HasFactory;

    protected $primaryKey = 'tipo_id';

    protected $fillable = [
        'nombre', 
        'gc_record'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new ValidScope);
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'tipo_id');
    }
}
