<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformacionNacimiento extends Model
{
    use HasFactory;

    protected $table = 'informacion_nacimiento';

    protected $fillable = [
        'persona_id',
        'pais_nacimiento',
        'provincia_nacimiento',
        'canton_nacimiento',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }
}
