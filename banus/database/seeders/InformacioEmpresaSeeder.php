<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformacioEmpresaSeeder extends Seeder
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
            'nom_empresa' => 'Fusteria Banús',
            'tel' => '938 17 34 00',
            'whatsapp' => '34675527356',
            'correu' => 'info@fusteriabanus.com',
            'adreca_1' => "Carrer d'Avinyonet del Penedès,15",
            'ciutat' => 'Vilafranca del Penedès',
            'provincia' => 'Barcelona',
            'zip_cp' => '08305',
            'nom_logo' => 'logo.jpeg',
            'alt_logo' => 'logo fusteria banus',
            'url_logo' => 'img/logo.jpeg',
        ]);
    }
}
