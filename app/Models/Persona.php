<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Persona extends Model
{
    protected $table = 'personas';
    protected $guarded = [];

    public function formacion(): HasOne
    {
        return $this->hasOne(Formacion::class, 'persona_id');
    }

    public function proyecto_persona(): HasOne
    {
        return $this->hasOne(Proyecto_Persona::class, 'persona_id');
    }

}
