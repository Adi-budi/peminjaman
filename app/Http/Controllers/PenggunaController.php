<?php

namespace App\Http\Controllers;
use App\Models\Pengguna;
use App\Models\Alat;
use DB;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PenggunaController extends Controller
{
    public function index() {
        $pengguna = Pengguna::latest()->get();
        return view('pengguna.index',compact('pengguna'))->with('i');
    }
    public function create()
    {
        $alat = DB::table('alats')->where('status_alat',0)->get();
        $ruangan = Ruangan::latest()->get();
        return view('pengguna.create',compact('alat','ruangan'))->with('i');
    }
    public function store(Request $request)
    {
        $flight = new Pengguna;
  
            $flight->nim = $request->nim;
            $flight->nama = $request->nama;
            $flight->nomor_telp = $request->nomor_telp;
            $flight->keperluan = $request->keperluan;
            $flight->alat = $request->alat;
            $flight->ruangan = $request->ruangan;
            $flight->status = 0;
            $flight->save();

        $barang = Alat::find($flight->alat);

            $barang->status_alat = 1;
            $barang->save();
   
        return redirect()->route('pengguna')->with('success','Pengguna Berhasil ditambah');
    }
    public function ubahstatus1(Request $request,$id,$id_barang){
        $flight = Pengguna::find($id);
            $flight->status = 1;
            $flight->save();

        $barang = Alat::find($id_barang);
            $barang->status_alat = 0;
            $barang->save();
        return redirect()->route('pengguna')->with('success','Status Berhasil diubah');

    }
    public function ubahstatus0(Request $request,$id,$id_barang){
            $flight = Pengguna::find($id);
            $flight->status = 0;
            $flight->save();

        $barang = Alat::find($id_barang);
            $barang->status_alat = 1;
            $barang->save();
        return redirect()->route('pengguna')->with('success','Status Berhasil diubah');
    }
    public function detail($id){
        $pengguna = DB::table('penggunas')->where('nim',$id)->get();
        DB::connection()->enableQueryLog();
        // $penggunae = Pengguna::findOrFail($id);
        $penggunalengkap = DB::table('penggunas')
            ->join('ruangans', 'penggunas.ruangan', '=', 'ruangans.id')
            ->join('alats', 'penggunas.alat', '=', 'alats.id')
            ->select('penggunas.*', 'ruangans.nama_ruang', 'alats.nama as nama_alat','ruangans.id as id_ruangan', 'alats.id as id_barang')
            ->where('penggunas.nim',$id)
            ->first();
        $queries = DB::getQueryLog();
        return view('pengguna.detail',compact('pengguna','penggunalengkap'))->with('i');
        // dd($queries);
    }
}
