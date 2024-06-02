<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $primaryKey = 'persona_id';

    protected $fillable = [
        'primer_nombre', 
        'segundo_nombre', 
        'tercer_nombre', 
        'primer_apellido', 
        'segundo_apellido', 
        'gc_record'
    ];

    protected $dates = [
        'created_at', 
        'updated_at'
    ];

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'persona_id');
    }

    public function tecnicos()
    {
        return $this->hasMany(Tecnico::class, 'persona_id');
    }
}
