<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('xarxes_socials')->insert([
            'nom' => 'Instagram',
            'icona' => 'fab fa-instagram',
            'enllac' => 'https://www.instagram.com/fusteriabanus/',
        ]);
    }
}
