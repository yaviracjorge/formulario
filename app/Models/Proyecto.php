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
}
