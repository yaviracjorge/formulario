<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DireccionDomicilio extends Model
{
     use HasFactory;

    protected $table = 'direccion_domicilio';

    protected $fillable = [
        'persona_id',
        'direccion_completa',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }
}
