<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $guarded = [];

    public function persona()
    {
        return $this->hasMany(Proyecto_Persona::class);
    }


    // Mutator: guarda en minúsculas
    public function setNombreProyectoAttribute($value)
    {
        $this->attributes['nombre_proyecto'] = is_string($value) ? strtolower(trim($value)) : $value;
    }

    // Accessor: muestra en MAYÚSCULAS
    public function getNombreProyectoAttribute($value)
    {
        return is_string($value) && !is_null($value) ? strtoupper($value) : $value;
    }
}
