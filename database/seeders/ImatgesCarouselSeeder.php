<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImatgesCarouselSeeder extends Seeder{
    public function run()
    {
        //
        DB::table('imatges_carrousel')->insert([            
            'url' => 'img/demo/carousel1.jpg',
            'alt' => 'Fuster de la fusteria banus',
            'color' => '#000000',
            'titol' => 'Fusteria Banus',
            'descripcio' => '<p>La millor Fusteria</p>',
            'posicio' => "0",
        ]);
    }
}