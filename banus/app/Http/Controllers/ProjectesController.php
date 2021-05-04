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
        return view('backend.projectes.create',compact('categories'));
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
            'descripcio_detallada' => 'required|string|min:3|max:500',
            'imatges' => 'required',
            'imatges.*' => 'image|mimes:jpeg,png,jpg,gif,svg',//dimensions:min_width=300,min_height=300
            'categories' => 'required',
            'categories.*' => 'exists:categories,id',
        ]);
        $projecte = Projecte::create([
            'titol' => ucfirst($data['titol']),
            'descripcio_breu' => $data['descripcio_breu'],
            'descripcio_detallada' => $data['descripcio_detallada'],
        ]);
        foreach($data['categories'] as $categoriaId){
            $projecte_categoria = Projecte_Categoria::create([
                'projecte_id' => $projecte->id,
                'categoria_id'=> $categoriaId,
            ]);
        }
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
        return redirect()->route('projectes.index');
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
        $projecte_categorias = Projecte_Categoria::where('projecte_id', '=', $projecte->id)->get();
        $projecte_imatges = Projecte_Imatge::where('projecte_id', '=', $projecte->id)->get();
        $categories = [];
        $imatges = [];
        foreach($projecte_categorias as $projecte_categoria ){
            $categoria = Categoria::find($projecte_categoria->categoria_id);
            array_push($categories,$categoria);
        }
        foreach($projecte_imatges as $projecte_imatge){
            $imatge = Imatge::find($projecte_imatge->imatge_id);
            array_push($imatges,$imatge);
        }
        return view('backend.projectes.show', compact(['projecte','categories','imatges']));
       
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
        $projecte_categorias = Projecte_Categoria::where('projecte_id', '=', $projecte->id)->get();
        $projecte_imatges = Projecte_Imatge::where('projecte_id', '=', $projecte->id)->get();
        $categories = Categoria::all();
        $categoriesDelProjecte = [];
        $imatges = [];
        foreach($projecte_categorias as $projecte_categoria ){
            $categoria = Categoria::find($projecte_categoria->categoria_id);
            array_push($categoriesDelProjecte,$categoria);
        }
        foreach($projecte_imatges as $projecte_imatge){
            $imatge = Imatge::find($projecte_imatge->imatge_id);
            array_push($imatges,$imatge);
        }
        return view('backend.projectes.edit', compact(['projecte','categoriesDelProjecte','imatges','categories']));

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
            'descripcio_detallada' => 'required|string|min:3|max:500',
            'imatges' => 'nullable',
            'imatges.*' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=300,min_height=300',
            'categories' => 'required',
            'categories.*' => 'exists:categories,id',
        ]);
        $projecte = Projecte::find($id);
        $projecte->update([
            'titol' => ucfirst($data['titol']),
            'descripcio_breu' => $data['descripcio_breu'],
            'descripcio_detallada' => $data['descripcio_detallada'],
        ]);
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
        return redirect()->route('projectes.index');
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
