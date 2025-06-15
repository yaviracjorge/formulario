<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactoEmergencia extends Model
{
     use HasFactory;

    protected $table = 'contacto_emergencia';

    protected $fillable = [
        'persona_id',
        'nombre',
        'parentesco',
        'telefono_convencional',
        'telefono_celular',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }
}
