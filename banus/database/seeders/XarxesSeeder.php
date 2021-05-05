<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class XarxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('informacio_empresa')->insert([
            'nom' => 'Instagram',
            'icona' => 'fab fa-instagram',
            'enllac' => 'https://www.instagram.com/fusteriabanus/',
        ]);
    }
}
