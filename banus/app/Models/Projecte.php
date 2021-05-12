<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use App\Models\Projecte_Categoria;
use App\Models\Imatge;
use App\Models\Projecte_Imatge;

class Projecte extends Model
{
    use HasFactory;
    protected $table = 'projectes';
    protected $fillable = [
        'titol',
        'descripcio_breu',
        'descripcio_detallada',
        'provincia',
        'ciutat',
        'zip_cp',
    ];
    public static function GetPathImg(){
        if(!Storage::exists('public/imatgesProjectes' )){
            Storage::makeDirectory('public/imatgesProjectes', 0775, true); 
        }
        return 'public/imatgesProjectes';
    } 
    public function GetProjecte(){
        $data = [];
        $projecte_categories = Projecte_Categoria::where('projecte_id', '=', $this->id)->get();
        $projecte_imatges = Projecte_Imatge::where('projecte_id', '=', $this->id)->get();

        $data['id'] = $this->id;
        $data['titol'] = $this->titol;
        $data['data'] = $this->created_at;
        $data['descripcio_breu'] = $this->descripcio_breu;
        $data['descripcio_detallada'] = $this->descripcio_detallada;
        $data['ciutat'] = $this->ciutat;
        $data['provincia'] = $this->provincia;

        foreach($projecte_categories as $projecte_categoria){
            $categoria = Categoria::find($projecte_categoria->categoria_id);
            $data['categories'][] = $categoria->name;
        }

        foreach($projecte_imatges as $projecte_imatge){
            $imatge = Imatge::find($projecte_imatge->imatge_id);
            $data['imatges'][$imatge->posicio]['url'] = $imatge->url;
            $data['imatges'][$imatge->posicio]['alt'] = $imatge->alt;
            $data['imatges'][$imatge->posicio]['id'] = $imatge->id;
            ksort($data['imatges'][$imatge->posicio]);
        }
        return $data;
    }
}
