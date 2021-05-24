<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Facades\Storage; 

class CarouselController extends Controller
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
        $carousel = Carousel::all()->sortBy("posicio");
        return view('backend.carousel.index',compact('carousel'));
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
        
        $data = $request->validate([
            'imatge' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'alt' => 'nullable',
            'color' => 'nullable',
            'titol' => 'nullable',
            'descripcio' => 'nullable|not_regex:/^(<script>)$/i',
        ]);
        
        if(!isset($data['alt'])){
            $data['alt'] = null;
        }
        if(!isset($data['titol'])){
            $data['titol'] = null;
        }
        if(!isset($data['descripcio'])){
            $data['descripcio'] = null;
        }
        if(!isset($data['color'])){
            $data['color'] = null;
        }
        
        $imgArxiu = $data['imatge']->store(Carousel::GetPathImg());
        $urlImgArxiu = Storage::url($imgArxiu);

      
        $carousel = Carousel::create([
            'url' => $urlImgArxiu,
            'alt' => $data['alt'],
            'color' =>$data['color'],
            'titol' => $data['titol'],
            'descripcio' => $data['descripcio'],
            'posicio' => Carousel::all()->count() + 1 ,
        ]);
        //return view('backend.carousel.edit',compact('carousel'))->with('status', 'Diapositiva desada correctament.');
        return redirect()->route('carousel.edit')->with('status', 'Diapositiva desada correctament.');
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
    public function edit()
    {
        //
        $carousel = Carousel::all()->sortBy("posicio");
        return view('backend.carousel.edit',compact('carousel'));
    }

    public function reOrdenarDiapositivas(Request $request){
        for($i = 0; $i < count($request['llistaOrdre']); $i++){
            $diapositiva = Carousel::find($request['llistaOrdre'][$i]);
            $diapositiva->update([
                'posicio' => $i,
            ]);
        }
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
            'imatge' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'alt' => 'nullable',
            'color' => 'nullable',
            'titol' => 'nullable',
            'descripcio' => 'nullable|not_regex:/^(<script>)$/i',
        ]);
        $diapositiva = Carousel::find($id);
        if(!isset($data['alt'])){
            $data['alt'] = null;
        }
        if(!isset($data['titol'])){
            $data['titol'] = null;
        }
        if(!isset($data['descripcio'])){
            $data['descripcio'] = null;
        }
        if(!isset($data['color'])){
            $data['color'] = null;
        }
        if(!isset($data['imatge'])){
            $diapositiva->update([
                'alt' => $data['alt'],
                'color' => $data['color'],
                'titol' => $data['titol'],
                'descripcio' => $data['descripcio'],
            ]);
        }else{
            
            //dd(Storage::delete(public_path()));
            unlink(public_path($diapositiva->url));
            //$deLocos = $diapositiva->url;
            $imgArxiu = $data['imatge']->store(Carousel::GetPathImg());
            $urlImgArxiu = Storage::url($imgArxiu);
            //dd($urlImgArxiu,$diapositiva->url);
            $diapositiva->update([
                'url' => $urlImgArxiu,
                'alt' => $data['alt'],
                'color' => $data['color'],
                'titol' => $data['titol'],
                'descripcio' => $data['descripcio'],
            ]);
            //dd($deLocos,$diapositiva->url,$urlImgArxiu);
        }
        return redirect()->route('carousel.edit')->with('status', 'Diapositiva desada correctament.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $diapositiva = Carousel::find($request['idImatge']);
        unlink(public_path($diapositiva->url));
        $diapositiva->delete();
        
    }
}
