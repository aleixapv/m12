<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Projecte;
use App\Models\Projecte_Categoria;
use App\Models\Imatge;
use App\Models\Projecte_Imatge;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage; 

class ProjectesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoria1 = Categoria::create([
            'name' => 'Interiors',
        ]);
        $categoria2 = Categoria::create([
            'name' => 'Cuines',
        ]);
        $projecte = Projecte::create([
            'titol' => 'Cuina panelada',
            'descripcio_breu' => 'Cuina oberta en xapa de roure vintage.',
            'descripcio_detallada' => 'Cuina oberta en xapa de roure vintage amb armaris hidrofòbics blancs i revestiment de xapa de roure de la ventilació, projecte realitzat per Totconsa.',
            'provincia' => 'Barcelona',
            'ciutat' => 'Vilafranca del Penedès',
            'zip_cp' => '8720',
        ]);
        $projecte_categoria1 = Projecte_Categoria::create([
            'projecte_id' => $projecte->id,
            'categoria_id' => $categoria1->id,
        ]);
        $projecte_categoria2 = Projecte_Categoria::create([
            'projecte_id' => $projecte->id,
            'categoria_id' => $categoria2->id,
        ]);
        $img = Imatge::create([
            'url' => 'img/demo/projecte/projecteDemo.png',
            'nom' => 'projecteDemo.png',
            'alt' => null,
            'posicio' => 0,
        ]);
        $projecte_Imatge = Projecte_Imatge::create([
            'projecte_id' => $projecte->id,
            'imatge_id' => $img->id,
        ]);


    }
}
