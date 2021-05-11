<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformacioEmpresa;
use Illuminate\Support\Facades\Storage; 

class InformacioEmpresaController extends Controller
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
        $informacio = InformacioEmpresa::all();
        if($informacio->isEmpty()){
            return view('backend.informacioEmpresa.create');
        }else{
            $informacio = $informacio->first();
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
            'tel'=> 'required|digits:9|numeric',
            'tel2'=> 'nullable|digits:9|numeric',
            'whatsapp'=> 'nullable|digits:11|numeric',
            'correu'=> 'required|email',
            'adreca_1'=> 'required|string|max:50',
            'adreca_2'=> 'nullable|string|max:50',
            'ciutat'=> 'required|string|max:50',
            'provincia'=> 'required|string|max:50',
            'zip_cp' => 'required|digits_between:4,5|numeric',
            'alt_logo'=> 'required',
            'imatge'=> 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imgArxiu = $data['imatge']->store('public');
        $urlImgArxiu = Storage::url($imgArxiu);
        $informacio = InformacioEmpresa::create([
            'nom_empresa' => strtoupper($data['nom_empresa']),
            'eslogan' => ucfirst($data['eslogan']),
            'tel'=> $data['tel'],
            'tel2'=> $data['tel2'],
            'tel2'=> $data['tel2'],
            'whatsapp'=> $data['whatsapp'],
            'correu'=> $data['correu'],
            'adreca_1'=> ucfirst($data['adreca_1']),
            'adreca_2'=> ucfirst($data['adreca_2']),
            'ciutat'=> ucfirst($data['ciutat']),
            'provincia'=> ucfirst($data['provincia']),
            'zip_cp'=> $data['zip_cp'],
            'nom_logo'=>$data['imatge']->getClientOriginalName(),
            'alt_logo'=>$data['alt_logo'],
            'url_logo'=>$urlImgArxiu,
        ]);
        return redirect()->route('informacio.empresa.index')->with('status', 'Informació de la empresa desada correctament.');
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
        $informacio =InformacioEmpresa::all()->first();
        return view('backend.informacioEmpresa.edit',compact('informacio'));
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
        $informacio =InformacioEmpresa::all()->first();
        $data = $request->validate([
            'nom_empresa' => 'required|string|min:3|max:50',
            'eslogan' => 'nullable|string|min:3|max:50',
            'tel'=> 'required|digits:9|numeric',
            'tel2'=> 'nullable|digits:9|numeric',
            'whatsapp'=> 'nullable|digits:11|numeric',
            'correu'=> 'required|email',
            'adreca_1'=> 'required|string|max:50',
            'adreca_2'=> 'nullable|string|max:50',
            'ciutat'=> 'required|string|max:50',
            'provincia'=> 'required|string|max:50',
            'zip_cp' => 'required|digits_between:4,5|numeric',
            'alt_logo'=> 'required',
            'imatge'=> 'nullable|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if(!isset($data['imatge'])){
            $nomImatge = $informacio->nom_logo;
            $urlImgArxiu = $informacio->url_logo;
        }else{
            $nomImatge = $data['imatge']->getClientOriginalName();
            $imgArxiu = $imatge->store('public');
            $urlImgArxiu = Storage::url($imgArxiu);
        }
        $informacio->update([
            'nom_empresa' => strtoupper($data['nom_empresa']),
            'eslogan' => ucfirst($data['eslogan']),
            'tel'=> $data['tel'],
            'tel2'=> $data['tel2'],
            'tel2'=> $data['tel2'],
            'whatsapp'=> $data['whatsapp'],
            'correu'=> $data['correu'],
            'adreca_1'=> ucfirst($data['adreca_1']),
            'adreca_2'=> ucfirst($data['adreca_2']),
            'ciutat'=> ucfirst($data['ciutat']),
            'provincia'=> ucfirst($data['provincia']),
            'zip_cp'=> $data['zip_cp'],
            'nom_logo'=> $nomImatge,
            'alt_logo'=>$data['nom_empresa'],
            'url_logo'=>$urlImgArxiu,
        ]);
        return redirect()->route('informacio.empresa.index')->with('status', 'Informació de la empresa desada correctament.');
    }

 
}
