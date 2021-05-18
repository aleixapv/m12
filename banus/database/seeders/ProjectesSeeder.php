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
        $categoria3 = Categoria::create([
            'name' => 'Particulars',
        ]);


        $projecte1 = Projecte::create([
            'titol' => 'Cuina panelada',
            'descripcio_breu' => '<p>Cuina oberta en xapa de roure vintage.</p>',
            'descripcio_detallada' => '<p>Cuina oberta en xapa de roure vintage amb armaris hidrof&ograve;bics blancs i revestiment de xapa de roure de la ventilaci&oacute;, projecte realitzat per Totconsa.</p>

            <table align="left" border="1" cellpadding="1" cellspacing="1" style="width:500px">
                <thead>
                    <tr>
                        <th scope="col">&nbsp;</th>
                        <th scope="col">mida</th>
                        <th scope="col">preu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>roure</td>
                        <td>m2</td>
                        <td>10&euro;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            
            <p>&nbsp;</p>',
            'provincia' => 'Barcelona',
            'ciutat' => 'Vilafranca del Penedès',
            'zip_cp' => '8720',
        ]);
        $projecte1_categoria1 = Projecte_Categoria::create([
            'projecte_id' => $projecte1->id,
            'categoria_id' => $categoria1->id,
        ]);
        $projecte1_categoria2 = Projecte_Categoria::create([
            'projecte_id' => $projecte1->id,
            'categoria_id' => $categoria2->id,
        ]);
        $projecte1_categoria3 = Projecte_Categoria::create([
            'projecte_id' => $projecte1->id,
            'categoria_id' => $categoria3->id,
        ]);
        $img = Imatge::create([
            'url' => 'img/demo/projecte/projecteDemo.png',
            'nom' => 'projecteDemo.png',
            'alt' => null,
            'posicio' => 0,
        ]);
        $projecte1_Imatge1 = Projecte_Imatge::create([
            'projecte_id' => $projecte1->id,
            'imatge_id' => $img->id,
        ]);


        $projecte2 = Projecte::create([
            'titol' => 'Moble de menjador',
            'descripcio_breu' => '<p>Moble de menjador amb escriptori integrat.</p>',
            'descripcio_detallada' => '<p>Moble de menjador amb escriptori integrat.</p>

            <p>El moble te un estil modern i minimalista amb una gran capacitat de emmagatzematge i organitzaci&oacute;.</p>
            
            <p>El escriptori te una porta que es desplega de amunt i baix per tencarlo amb el objectiu de donar un ambient mes net i ordenat quant no es utilitzat.</p>
            
            <p>&nbsp;</p>
            
            <p>&nbsp;</p>',
            'provincia' => 'Barcelona',
            'ciutat' => 'Perafita',
            'zip_cp' => '8589',
        ]);
        $projecte2_categoria1 = Projecte_Categoria::create([
            'projecte_id' => $projecte2->id,
            'categoria_id' => $categoria3->id,
        ]);
        $projecte2_categoria2 = Projecte_Categoria::create([
            'projecte_id' => $projecte2->id,
            'categoria_id' => $categoria1->id,
        ]);

        $img2 = Imatge::create([
            'url' => 'img/demo/projecte/projecteDemo2.jpeg',
            'nom' => 'projecteDemo2.jpeg',
            'alt' => null,
            'posicio' => 0,
        ]);
        $projecte2_Imatge1 = Projecte_Imatge::create([
            'projecte_id' => $projecte2->id,
            'imatge_id' => $img2->id,
        ]);


        $projecte3 = Projecte::create([
            'titol' => 'Panelat per aquari',
            'descripcio_breu' => '<p>Panelat lacat per un aquari en un mejador.</p>',
            'descripcio_detallada' => '<p>Panelat lacat per un aquari en un mejador.</p>

            <p>Tots els accessos son personalitzat i amb les indicacions del particular,</p>
            
            <p>els accessos son herm&egrave;tics per evitar filtracions de llum.</p>',
            
        ]);
        $projecte3_categoria1 = Projecte_Categoria::create([
            'projecte_id' => $projecte3->id,
            'categoria_id' => $categoria3->id,
        ]);
        $projecte3_categoria2 = Projecte_Categoria::create([
            'projecte_id' => $projecte3->id,
            'categoria_id' => $categoria1->id,
        ]);

        $img3 = Imatge::create([
            'url' => 'img/demo/projecte/projecteDemo3.jpeg',
            'nom' => 'projecteDemo3.jpeg',
            'alt' => null,
            'posicio' => 0,
        ]);
        $projecte3_Imatge1 = Projecte_Imatge::create([
            'projecte_id' => $projecte3->id,
            'imatge_id' => $img3->id,
        ]);

        $img4 = Imatge::create([
            'url' => 'img/demo/projecte/projecteDemo4.jpeg',
            'nom' => 'projecteDemo4.jpeg',
            'alt' => null,
            'posicio' => 1,
        ]);
        $projecte3_Imatge2 = Projecte_Imatge::create([
            'projecte_id' => $projecte3->id,
            'imatge_id' => $img4->id,
        ]);
    }
}
