<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formacion extends Model
{
    protected $table = "formacion";
    protected $guarded = [];



    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
