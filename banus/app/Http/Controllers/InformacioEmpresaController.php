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
            'nom_empresa' => '',
            'eslogan' => '',
            'tel'=> '',
            'correu'=> '',
            'cp'=> '',
            'ciutat'=> '',
            'carrer'=> '',
            'numero'=> '',
            'alt_logo'=> '',
            'imatge'=> '',
        ]);
        $informacio = InformacioEmpresa::create([
            'nom_empresa' => $data['nom_empresa'],
            'eslogan' => '',
            'tel'=> '',
            'correu'=> '',
            'cp'=> '',
            'ciutat'=> '',
            'carrer'=> '',
            'numero'=> '',
            'nom_logo'=>,
            'alt_logo'=>,
            'url_logo'=>,
        ]);
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
