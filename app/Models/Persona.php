<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Persona extends Model
{
    protected $table = 'personas';
    protected $guarded = [];
    protected $capitalizar = [
        'nombres',
        'apellidos',
        'estado_civil',
        'restriccion_alimentaria',
        'direccion_domicilio',
        'pais_nacimiento',
        'provincia_nacimiento',
        'canton_nacimiento',
        'discapacidad_detalle',
        'alergia_detalle',
        'contacto_emergencia_nombre',
        'contacto_emergencia_parentesco',
        'ultima_empresa',
    ];

    public function formacion(): HasOne
    {
        return $this->hasOne(Formacion::class, 'persona_id');
    }

    public function proyecto_persona()
    {
        return $this->hasOne(Proyecto_Persona::class, 'persona_id')
            ->whereNull('fecha_salida')
            ->latest('fecha_ingreso');
    }

    // Cambia de hasOne a hasMany para obtener todos los proyectos
    public function proyectos()
    {
        return $this->hasMany(Proyecto_Persona::class, 'persona_id');
    }


    //transforma los datos antes de guardarlos en este caso en minusculas
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $campos = [
                'cedula_pasaporte',
                'ruc',
                'apellidos',
                'nombres',
                'estado_civil',
                'restriccion_alimentaria',
                'direccion_domicilio',
                'pais_nacimiento',
                'provincia_nacimiento',
                'canton_nacimiento',
                'discapacidad_detalle',
                'alergia_detalle',
                'tipo_sangre',
                'correo',
                'contacto_emergencia_nombre',
                'contacto_emergencia_parentesco',
                'contacto_emergencia_convencional',
                'contacto_emergencia_celular',
                'telefono_convencional',
                'telefono_celular',
                'ultima_empresa',
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
