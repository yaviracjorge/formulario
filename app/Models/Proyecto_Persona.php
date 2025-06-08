<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Proyecto_Persona extends Model
{
    protected $guarded = [];
    protected $table = 'proyecto_personas';
    protected $capitalizar = [
        'cargo',
        'sucursal',
        'lugar_sufragio'
    ];



    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }


    //transforma los datos antes de guardarlos en este caso en minusculas
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $campos = [
                'cargo',
                'sucursal',
                'lugar_sufragio'
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
