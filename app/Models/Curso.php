<?php

namespace App\Models;


use Dom\Attr;
use Dotenv\Parser\Value;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'descripcion',
        'categoria',
    ];



    protected function casts(): array
    {
        return [
            'fecha_inicio' => 'datetime:d-m-Y',
            'estado' => 'boolean',
        ];
    }


    protected function name(): Attribute
    {
        return new Attribute(
            // esto es un accesor, transforma el valor antes de mostrarlo
            get: function ($value) {
                return ucwords($value);
            },
            // esto es un mutador, transforma el valor antes de guardarlo en la base de datos
            set: function ($value) {
                return strtolower($value);
            }
        );
    }

  
    protected function estado(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['estado'] ? 'Activo' : 'Inactivo',
        );
    }
}
