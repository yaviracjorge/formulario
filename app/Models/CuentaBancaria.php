<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CuentaBancaria extends Model
{
    protected $table = "cuentabancaria";
    protected $guarded = [];
    protected $capitalizar = [
        'banco',
        'tipo_cuenta'
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $campos = [
                'banco',
                'tipo_cuenta'
            ];

            foreach ($campos as $campo) {
                if (!is_null($model->$campo)) {
                    $model->$campo = strtolower($model->$campo);
                }
            }
        });
    }

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->capitalizar) && is_string($value)) {
            return ucwords($value);
        }

        return $value;
    }

    public function cuentaBancaria()
{
    return $this->hasOne(CuentaBancaria::class, 'persona_id');
}
}