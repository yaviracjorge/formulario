<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformacionMedica extends Model
{
     use HasFactory;

    protected $table = 'informacion_medica';

    protected $fillable = [
        'persona_id',
        'tipo_sangre',
        'posee_discapacidad',
        'discapacidad_detalle',
        'posee_alergia',
        'alergia_detalle',
        'posee_restriccion_alimentaria',
        'restriccion_alimentaria_detalle',
    ];

    protected $casts = [
        'posee_discapacidad' => 'boolean',
        'posee_alergia' => 'boolean',
        'posee_restriccion_alimentaria' => 'boolean',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }
}
