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
        return view('alat.create');
    }
    public function store(Request $request)
    {
        $alat = Alat::where('nama', $request->nama)->first();
        // dd($alat);
        if(!$alat){
            $flight = new Alat;
  
            $flight->nama = $request->nama;
            $flight->jumlah = $request->jumlah;
            $flight->save();

            return redirect()->route('alat.index')->with('success','barang Berhasil ditambah');
        }else{
            return redirect()->route('alat.index')->with('error','Alat '.$request->nama.' sudah terdaftar');
        }
    }
    public function detail($id){
        $alat = DB::table('alats')->where('id_ruang',$id)->get();
        return view('alat.detail',compact('alat'))->with('i');
        // dd($alat);

    }

}