<?php

namespace App\Http\Controllers;
use App\Models\Ruang;
use DB;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index() {
        $ruangan = Ruang::latest()->get();
        return view('ruangan.index',compact('ruangan'))->with('i');
    }
    public function create()
    {
        return view('ruangan.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_ruang' => 'required',
        ]);
  
        Ruangan::create([
            'nama_ruang' => $request->nama_ruang,
        ]);
   
        return redirect()->route('ruangan')->with('success','Ruangan Berhasil ditambah');
    }
    public function detail($id){
        $alat = DB::table('alats')->where('id_ruang',$id)->get();
        return view('ruangan.detail',compact('alat'))->with('i');
        // dd($alat);

    }

}