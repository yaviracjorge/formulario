<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formacion extends Model
{
    protected $table = "formacion";
    protected $guarded = [];
    protected $capitalizar = [
        'nivel',
        'titulo_obtenido'
    ];



    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    //transforma los datos antes de guardarlos en este caso en minusculas
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $campos = [
                'nivel',
                'titulo_obtenido'
            ];

            foreach ($campos as $campo) {
                if (!is_null($model->$campo)) {
                    $model->$campo = strtolower($model->$campo);
                }
            }
        });
    }

    //transforma lo datos antes de mostrarlos en este caso la prmera letra en mayuscula
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->capitalizar) && is_string($value)) {
            return ucwords($value);
        }

        return $value;
    }
}
