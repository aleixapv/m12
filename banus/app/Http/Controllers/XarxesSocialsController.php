<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\XarxaSocial;

class XarxesSocialsController extends Controller
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
        $xarxes = XarxaSocial::all();
        return view('backend.xarxes.index',compact('xarxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.xarxes.create');
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
            'nom' => 'required|string|min:3|max:50|unique:xarxes_socials',
            'icona' => 'required|string|min:3|max:50',
            'enllac' => 'required|string|min:3|max:50',
        ]);
        $xarxa = XarxaSocial::create([
            'nom' => ucfirst($data['nom']),
            'icona' => $data['icona'],
            'enllac' => $data['enllac'],
        ]);
        return redirect()->route('xarxes.index');
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
        $xarxa = XarxaSocial::find($id);
        return view('backend.xarxes.edit',compact('xarxa'));
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
            'nom' => 'required|string|min:3|max:50|unique:xarxes_socials,nom,'.$id,
            'icona' => 'required|string|min:3|max:50',
            'enllac' => 'required|string|min:3|max:50',
        ]);
        $xarxa = XarxaSocial::find($id);
        $xarxa->update([
            'nom' => ucfirst($data['nom']),
            'icona' => $data['icona'],
            'enllac' => $data['enllac'],
        ]);
        return redirect()->route('xarxes.index');
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
        $xarxa = XarxaSocial::find($id);
        $xarxa->delete();
        return redirect()->route('xarxes.index');
    }
}
