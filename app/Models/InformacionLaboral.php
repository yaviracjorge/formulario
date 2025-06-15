<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformacionLaboral extends Model
{
    use HasFactory;

    protected $table = 'informacion_laboral';

    protected $fillable = [
        'persona_id',
        'ultima_empresa',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }
}
