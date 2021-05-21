<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servei;

class serveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $servei1 = Servei::create([
            'nom' => 'Qui som',
            'descripcio' => "<p>Som una empresa jove, que des de l&#39;any 2003<br />
            hem anat creixent al costat dels nostres clients<br />
            fins a ser una empresa consolidada dins del nostre sector.</p>
            
            <p>La nostra polivalent traject&ograve;ria ens ha format en tots els sentits,<br />
            amb experi&egrave;ncia, sacrifici i servei.</p>
            
            <p>Al llarg d&#39;aquests anys ens hem especialitzat<br />
            en diferents camps.</p>",
        ]);
        $servei2 = Servei::create([
            'nom' => 'Fusteria convencional',
            'descripcio' => "<ul>
            <li>- Portes de tot tipus</li>
            <li>- Parquets</li>
            <li>- Armaris a mida</li>
            <li>- Cuines</li>
            <li>- Mobiliari de bany</li>
            <li>- Tarimes d&acute;exterior</li>
            <li>- Tot tipus de decoraci&oacute; en general</li>
            <li>- Fabriquem i mecanitzem tot tipus de mobiliari en s&egrave;rie.</li>
            <li>- Armaris en s&egrave;rie per a obres</li>
            <li>- Portes en block</li>
            <li>- Mecanitzaci&oacute; de tot tipus de peces en s&egrave;rie.</li>
        </ul>",
        ]);
        $servei3 = Servei::create([
            'nom' => 'Espais comercials',
            'descripcio' => "<p>Fabriquem tot tipus de mobiliari per a botigues:</p>

            <ul>
                <li>- Mobles taulells</li>
                <li>- Mobles expositors</li>
                <li>- Panells amb accesoris de tot tipus</li>
            </ul>",
        ]);
    }
}
