<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecte;
use App\Models\Categoria;
use App\Models\Projecte_Categoria;
use App\Models\Imatge;
use App\Models\Projecte_Imatge;
use App\Models\InformacioEmpresa;
use App\Models\XarxaSocial;

class frontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Categoria::all();
        $informacio = InformacioEmpresa::all()->first();
        $xarxes = XarxaSocial::all();
        return view('frontend.index',compact(['categories','informacio','xarxes']));
    }
    public function showprojecte(){
        return view('frontend.projecte');
    }
    public function showcontacte(){
        //
        $categories = Categoria::all();
        $informacio = InformacioEmpresa::all()->first();
        $xarxes = XarxaSocial::all();
        return view('frontend.contacte', compact(['categories','informacio','xarxes']));
    }

    public function showprojectes(){
        $informacio = InformacioEmpresa::all()->first();
        $projectesObj = [];
        $projectes = Projecte::all();
        $categories = Categoria::all();
        $imatges = Imatge::all();
        $projectes_imatges = Projecte_imatge::all();
        $xarxes = XarxaSocial::all();
        foreach($projectes as $projecte){
            $data = [];
            $projecte_categories = Projecte_Categoria::where('projecte_id', '=', $projecte->id)->get();
            $projecte_imatges = Projecte_Imatge::where('projecte_id', '=', $projecte->id)->get();
            $data['titol'] = $projecte->titol;
            $data['data'] = $projecte->created_at;
            $data['descripcio_breu'] = $projecte->descripcio_breu;
            $data['descripcio_detallada'] = $projecte->descripcio_detallada;
            foreach($projecte_categories as $projecte_categoria){
                $categoria = Categoria::find($projecte_categoria->categoria_id);
                $data['categories'][] = $categoria->name;
            }
            foreach($projecte_imatges as $projecte_imatge){
                $imatge = Imatge::find($projecte_imatge->imatge_id);
                $data['imatges'][$imatge->id]['url'] = $imatge->url;
                $data['imatges'][$imatge->id]['alt'] = $imatge->alt;
            }
            array_push($projectesObj,$data);
        }
        //dd($projectesObj);
        return view('frontend.projectes',compact(['projectesObj','categories','informacio','xarxes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
    }
}
