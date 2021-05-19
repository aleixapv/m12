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
use App\Models\Servei;
use App\Models\Carousel;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailController;


class frontEndController extends Controller
{
    //const Categories = Categoria::all();
    //const Categories = Categoria::all();
    //const Informacio = InformacioEmpresa::all()->first();
    //const Xarxes = XarxaSocial::all();

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
        $carousel = Carousel::all()->sortBy("posicio");

        $serveis = Servei::all();
        return view('frontend.index',compact(['categories','informacio','xarxes','serveis','carousel']));
    }
   
    public function showcontacte(){
        //
        $categories = Categoria::all();
        $informacio = InformacioEmpresa::all()->first();
        $xarxes = XarxaSocial::all();
        return view('frontend.contacte', compact(['categories','informacio','xarxes']));
    }

    public function showprojectes(){
        
        $projectesObj = [];
        
        $categories = Categoria::all();
        $informacio = InformacioEmpresa::all()->first();
        $xarxes = XarxaSocial::all();

        $projectes = Projecte::all();
        foreach($projectes as $projecte){
            $data = $projecte->GetProjecte();
            array_push($projectesObj,$data);
        }
        
        return view('frontend.projectes',compact(['projectesObj','categories','informacio','xarxes']));
    }

    public function mail(Request $request){
        $data = $request->validate([
            'nom_contacte' => 'required|string',
            'email_contacte' => 'required|email',
            'tel_contacte' => 'required|digits_between:9,11|numeric',
            'missatge_contacte' => 'required|string',
        ]);
        $correu = new \stdClass();
        $correu->nom_contacte = $data['nom_contacte'];
        $correu->email_contacte = $data['email_contacte'];
        $correu->tel_contacte = $data['tel_contacte'];
        $correu->missatge_contacte = $data['missatge_contacte'];   
        $informacio = InformacioEmpresa::all()->first();
        Mail::to('aleixaleixaleixaleix@gmail.com')->send(new MailController($correu,$informacio));
        return redirect()->route('contacte.view');//->with('status', 'Projecte desat correctament.');
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
