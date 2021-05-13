<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servei;
use Illuminate\Support\Facades\Storage; 
class ServeisController extends Controller
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
        $serveis = Servei::all();
        return view('backend.serveis.index',compact('serveis'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.serveis.create');
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
            'nom' => 'required|string|min:3|max:50|unique:serveis',
            'descripcio' => 'required|string|min:3|max:200',
            'imatge' => 'image|mimes:jpeg,png,jpg,gif,svg',//dimensions:min_width=300,min_height=300
        ]);
        $imgArxiu = $data['imatge']->store('public');
        $urlImgArxiu = Storage::url($imgArxiu);
        $servei = Servei::create([
            'nom' => ucfirst($data['nom']),
            'descripcio' => ucfirst($data['descripcio']),
            'imatge' => $urlImgArxiu,
        ]);
        return redirect()->route('serveis.index')->with('status', 'Servei desat correctament.');
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
        $servei = Servei::find($id);
        return view('backend.serveis.show',compact('servei'));
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
        $servei = Servei::find($id);
        return view('backend.serveis.edit',compact('servei'));
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
        $data = $request->validate([
            'nom' => 'required|string|min:3|max:50|unique:serveis,nom,'.$id,
            'descripcio' => 'required|string|min:3|max:200',
            'imatge' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',//dimensions:min_width=300,min_height=300
        ]);
        $servei = Servei::find($id);
        if(isset($data['imatge'])){
            Storage::delete( $servei->imatge);
            $imgArxiu = $data['imatge']->store(Servei::GetPathImg());
            $urlImgArxiu = Storage::url($imgArxiu);
            $servei->update([
                'nom' => ucfirst($data['nom']),
                'descripcio' => ucfirst($data['descripcio']),
                'imatge' => $urlImgArxiu,
            ]);
        }else{
            $servei->update([
                'nom' => ucfirst($data['nom']),
                'descripcio' => $data['descripcio'],
            ]);
        }
        return redirect()->route('serveis.index')->with('status', 'Servei desat correctament.');
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
        $servei = Servei::find($id);
        Storage::delete( $servei->imatge);
        $servei->delete();
        return redirect()->route('serveis.index')->with('status', 'Servei eliminat correctament.');
    }
}
