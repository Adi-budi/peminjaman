<?php

namespace App\Http\Controllers;

use App\Models\Tas;
use App\Models\DetailTas;
use App\Models\Alat;
use Illuminate\Http\Request;
use DB;

class TasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tas = Tas::latest()->get();
        $detail = DB::table('detail_tas')->join('alats', 'alats.id', '=', 'detail_tas.alat')->get();
        return view('tas.index',compact('tas', 'detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alat = Alat::latest()->get();
        return view('tas.create',compact('alat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tas = new Tas;
  
        $tas->label = $request->label;
        $tas->save();

        for ($i=0; $i < count($request->isi); $i++) { 
            $detail_tas = new DetailTas;

            $detail_tas->tas = $tas->id;
            $detail_tas->alat = $request->isi[$i];
            $detail_tas->save();
        }
        
        return redirect()->route('tas.index')->with('success','barang Berhasil ditambah');
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
