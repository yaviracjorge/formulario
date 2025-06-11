<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Persona extends Model
{
    protected $table = 'personas';
    protected $guarded = []; // asignación masiva permitida

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

    public function formacion()
    {
        return $this->hasMany(Formacion::class, 'persona_id');
    }

    public function proyectos_persona()
    {
        return $this->hasMany(ProyectoPersona::class);
    }

    public function proyecto_persona()
    {
        return $this->hasOne(ProyectoPersona::class)->whereNull('fecha_salida');
    }

    public function proyecto_actual()
    {
        return $this->hasOne(ProyectoPersona::class)
            ->with('proyecto')
            ->whereNull('fecha_salida')
            ->latest('fecha_ingreso');
    }

    public function cuentaBancaria()
    {
        return $this->hasOne(CuentaBancaria::class);
    }

    protected $casts = [
        'fecha_nacimiento' => 'date:Y-m-d',
        'posee_discapacidad' => 'boolean',
        'posee_alergia' => 'boolean',
    ];

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

    public function getNombresAttribute($value)
    {
        return ucwords($value);
    }

    public function getApellidosAttribute($value)
    {
        return ucwords($value);
    }

    public function getEstadoCivilAttribute($value)
    {
        return ucwords($value);
    }

    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return Storage::url($this->foto);
        }
        return asset('images/default.png');
    }
}
