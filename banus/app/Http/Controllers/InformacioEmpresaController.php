<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformacioEmpresa;

class InformacioEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $informacio = InformacioEmpresa::all();
        if($informacio->isEmpty()){
            return view('backend.informacioEmpresa.create');
        }else{
            return view('backend.informacioEmpresa.show',compact('informacio'));
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
            'nom_empresa' => 'required|string|min:3|max:50',
            'eslogan' => 'nullable|string|min:3|max:50',
            'tel'=> 'required|min:9|numeric',
            'correu'=> 'required|email',
            'adreca_1'=> 'required|string|max:50',
            'adreca_2'=> 'nullable|string|max:50',
            'ciutat'=> 'required|string|max:50',
            'provincia'=> 'required|string|max:50',
            'zip/cp' => 'required|size:5|integer',
            'alt_logo'=> 'required',
            'imatge'=> 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imgArxiu = $data['imatge']->store('public');
        $urlImgArxiu = Storage::url($imgArxiu);
        $informacio = InformacioEmpresa::create([
            'nom_empresa' => $data['nom_empresa'],
            'eslogan' => ucfirst($data['eslogan']),
            'tel'=> $data['tel'],
            'correu'=> $data['correu'],
            'adreca_1'=> $data['adreca_1'],
            'adreca_2'=> $data['adreca_2'],
            'adreca_2'=> $data['carrer'],
            'ciutat'=> $data['ciutat'],
            'provincia'=> $data['provincia'],
            'zip/cp'=> $data['zip/cp'],
            'nom_logo'=>$data['imatge']->getClientOriginalName(),
            'alt_logo'=>$data['nom_empresa'],
            'url_logo'=>$urlImgArxiu,
        ]);
        return redirect()->route('informacio.empresa.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
    public function update(Request $request)
    {
        //
    }

 
}
