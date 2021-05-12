<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecte;
use App\Models\Categoria;
use App\Models\Projecte_Categoria;
use App\Models\Imatge;
use App\Models\Projecte_Imatge;
use Illuminate\Support\Facades\Storage; 

class ProjectesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projectes= Projecte::all();
        return view('backend.projectes.index',compact('projectes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Categoria::all();
        if($categories->isEmpty()){
            return redirect()->route('projectes.index')->with('malStatus','Sense categories no es pot crear un projecte.');
        }else{
            return view('backend.projectes.create',compact('categories'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'titol' => 'required|string|min:3|max:50|unique:projectes',
            'descripcio_breu' => 'required|string|min:3|max:50',
            'descripcio_detallada' => 'required|string|min:3|max:1000',
            'imatges' => 'required',
            'imatges.*' => 'image|mimes:jpeg,png,jpg,gif,svg',//dimensions:min_width=300,min_height=300
            'categories' => 'required',
            'categories.*' => 'exists:categories,id',
            'ciutat'=> 'nullable|string|max:50',
            'provincia'=> 'nullable|string|max:50',
            'zip_cp' => 'nullable|digits_between:4,5|numeric',
            'imatgesOrdre' => 'required',
        ]);
        
        $imatgesOrdenades = [];
        foreach($data['imatgesOrdre'] as $ordre){
            $imatgesOrdenades[$ordre] = $data['imatges'][$ordre];
        }

        if(isset($data['provincia']) && isset($data['ciutat']) && isset($data['zip_cp'])){
            $provincia = ucfirst($data['provincia']);
            $ciutat = ucfirst($data['ciutat']);
            $zip_cp = ucfirst($data['zip_cp']);
        }else{
            $provincia = null;
            $ciutat = null;
            $zip_cp = null;
        }

        $projecte = Projecte::create([
            'titol' => ucfirst($data['titol']),
            'descripcio_breu' => ucfirst($data['descripcio_breu']),
            'descripcio_detallada' => ucfirst($data['descripcio_detallada']),
            'provincia' => $provincia,
            'ciutat' => $ciutat,
            'zip_cp'=> $zip_cp,
        ]);

        foreach($data['categories'] as $categoriaId){
            $projecte_categoria = Projecte_Categoria::create([
                'projecte_id' => $projecte->id,
                'categoria_id'=> $categoriaId,
            ]);
        }

        $imatges_db = [];
        for($i = 0; $i < count($imatgesOrdenades); $i++) {
            $imgArxiu = $imatgesOrdenades[$i]->store(Projecte::GetPathImg());
            $urlImgArxiu = Storage::url($imgArxiu);
            $imatge_db =  Imatge::create([
                'url' => $urlImgArxiu,
                'nom' => $imatgesOrdenades[$i]->getClientOriginalName(),
                'posicio' => $i,
            ]);
            array_push($imatges_db,$imatge_db);
        }
        

        foreach($imatges_db as $imatge_db){
            $projecte_imatge = Projecte_Imatge::create([
                'projecte_id' => $projecte->id,
                'imatge_id' => $imatge_db->id,
            ]);
        }
        return redirect()->route('projectes.index')->with('status', 'Projecte desat correctament.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $projecte = Projecte::find($id);
        $projecte = $projecte->GetProjecte();
        return view('backend.projectes.show', compact('projecte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $projecte = Projecte::find($id);
        $projecte = $projecte->GetProjecte();
        $categories = Categoria::all();
        return view('backend.projectes.edit', compact(['projecte','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //unique:users,email,'.Auth::id(),
        
        $data = $request->validate([
            'titol' => 'required|string|min:3|max:50|unique:projectes,titol,'.$id,
            'descripcio_breu' => 'required|string|min:3|max:50',
            'descripcio_detallada' => 'required|string|min:3|max:1000',
            'imatges' => 'required',
            'imatges.*' => 'image|mimes:jpeg,png,jpg,gif,svg',//dimensions:min_width=300,min_height=300
            'categories' => 'required',
            'categories.*' => 'exists:categories,id',
            'ciutat'=> 'nullable|string|max:50',
            'provincia'=> 'nullable|string|max:50',
            'zip_cp' => 'nullable|digits_between:4,5|numeric',
            'imatgesOrdre' => 'required',
        ]);
       
        $projecte = Projecte::find($id);

        $imatgesOrdenades = [];
        foreach($data['imatgesOrdre'] as $ordre){
            if(is_array($ordre)){
                foreach($ordre as $idImage){
                    $imatge = Imatge::find($idImage);
                    array_push($imatgesOrdenades,$imatge);
                }
            }else{
                array_push($imatgesOrdenades,$data['imatges'][$ordre]);
            }
        }
        dd($imatgesOrdenades);

        if(isset($data['provincia']) && isset($data['ciutat']) && isset($data['zip_cp'])){
            $provincia = ucfirst($data['provincia']);
            $ciutat = ucfirst($data['ciutat']);
            $zip_cp = ucfirst($data['zip_cp']);
        }else{
            $provincia = null;
            $ciutat = null;
            $zip_cp = null;
        }

        $projecte->update([
            'titol' => ucfirst($data['titol']),
            'descripcio_breu' => ucfirst($data['descripcio_breu']),
            'descripcio_detallada' => ucfirst($data['descripcio_detallada']),
            'provincia' => $provincia,
            'ciutat' => $ciutat,
            'zip_cp'=> $zip_cp,
        ]);

        //per aqui
        $projecte_categorias = Projecte_Categoria::where('projecte_id','=', $projecte->id)->get();
        foreach($projecte_categorias as $projecte_categoria){
            $projecte_categoria->delete();
        }
        foreach($data['categories'] as $categoriaId){
            $projecte_categoria = Projecte_Categoria::create([
                'projecte_id' => $projecte->id,
                'categoria_id'=> $categoriaId,
            ]); 
        }
        if(isset($data['imatges'])){
            $imatges_db = [];
            foreach($data['imatges'] as $imatge){
                $imgArxiu = $imatge->store('public');
                $urlImgArxiu = Storage::url($imgArxiu);
                $imatge_db =  Imatge::create([
                    'url' => $urlImgArxiu,
                    'nom' => $imatge->getClientOriginalName(),
                ]);
                array_push($imatges_db,$imatge_db);
            }
            foreach($imatges_db as $imatge_db){
                $projecte_imatge = Projecte_Imatge::create([
                    'projecte_id' => $projecte->id,
                    'imatge_id' => $imatge_db->id,
                ]);
            }
        }
        return redirect()->route('projectes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $projecte = Projecte::find($id);
        $projecte->delete();
        return redirect()->route('projectes.index')->with('status', 'Projecte eliminat correctament.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyImatge(Request $request)
    {
        //
        $id = $request['id'];
        $imatge = Imatge::find($id);
        $imatge->delete();
        $resposta = ['resposta'=>'tot be'];
        return($resposta);        
    }
}
