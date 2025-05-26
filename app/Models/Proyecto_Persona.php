<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto_Persona extends Model
{
     protected $guarded = [];
    protected $table = 'proyecto_personas';

        public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

            public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }
}
