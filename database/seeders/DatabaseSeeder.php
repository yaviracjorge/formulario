<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proyecto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //Curso::factory(10)->create();
         $proyectos = [
            'PPM',
            'OIM', 
            'GIZ',
            'MOFA',
            'GEFO',
            'NIDO',
            'INFO PALANTE',
            'ACF'
        ];
        foreach ($proyectos as $nombre) {
            Proyecto::firstOrCreate(['nombre_proyecto' => $nombre]);
        }
   
    }
}
