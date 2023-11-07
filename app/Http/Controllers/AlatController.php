<?php

namespace App\Http\Controllers;
use App\Models\Alat;
use App\Models\Ruangan;
use DB;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index() {
        $alat = Alat::latest()->get();
        return view('alat.index',compact('alat'))->with('i');
    }
    public function create()
    {
        $ruangan = Ruangan::latest()->get();
        return view('alat.create',compact('ruangan'))->with('i');
    }
    public function store(Request $request)
    {
        $flight = new Alat;
  
            $flight->nama = $request->nama;
            $flight->id_ruang = $request->id_ruang;
            $flight->status_alat = 0;
            $flight->save();
   
        return redirect()->route('alat')->with('success','barang Berhasil ditambah');
    }
    public function detail($id){
        $alat = DB::table('alats')->where('id_ruang',$id)->get();
        return view('alat.detail',compact('alat'))->with('i');
        // dd($alat);

    }

}