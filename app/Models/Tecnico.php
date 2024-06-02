<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ValidScope;

class Tecnico extends Model
{
    use HasFactory;

    protected $primaryKey = 'tecnico_id';

    protected $fillable = [
        'persona_id', 
        'gc_record'
    ];

    protected $dates = [
        'created_at', 
        'updated_at'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new ValidScope);
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'tecnico_id');
    }
}
