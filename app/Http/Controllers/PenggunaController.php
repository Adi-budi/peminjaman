<?php

namespace App\Http\Controllers;
use App\Models\Pengguna;
use App\Models\Alat;
use DB;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DateTime;

class PenggunaController extends Controller
{
    public function index() {
        $pengguna = Pengguna::latest()->get();
        $pengguna2 = DB::table('penggunas')
            ->join('ruangans', 'penggunas.ruangan', '=', 'ruangans.id')
            ->select('penggunas.*', 'ruangans.nama_ruang')
            ->get();
        return view('pengguna.index',compact('pengguna','pengguna2'))->with('i');
    }
    public function create()
    {
        $alat = DB::table('tas')->get();
        $ruangan = Ruang::latest()->get();
        return view('pengguna.create',compact('alat','ruangan'))->with('i');
    }
    public function store(Request $request)
    {
        $flight = new Pengguna;
  
            $flight->nim = $request->nim;
            $flight->nama = $request->nama;
            $flight->nomor_telp = $request->nomor_telp;
            $flight->keperluan = $request->keperluan;
            $flight->ruangan = $request->ruangan;
            $flight->save();

        // $barang = Alat::find($flight->alat);

        //     $barang->status_alat = 1;
        //     $barang->save();
   
        return redirect()->route('pengguna')->with('success','Pengguna Berhasil ditambah');
    }
    public function ubahstatus1(Request $request,$id){
        $flight = Pengguna::find($id);
            $flight->tgl_kembali = new DateTime();
            $flight->save();
        return redirect()->route('pengguna')->with('success','Status Berhasil diubah');

    }
    public function ubahstatus0(Request $request,$id){
            $flight = Pengguna::find($id);
            $flight->tgl_kembali = null;
            $flight->save();
        return redirect()->route('pengguna')->with('success','Status Berhasil diubah');
    }
    public function detail($id){
        $pengguna = Pengguna::where('nim',$id)
                    ->join('ruangans', 'ruangans.id', '=', 'penggunas.ruangan')
                    ->select("penggunas.*", "ruangans.nama_ruang")->get();
        DB::connection()->enableQueryLog();
        $detail = DB::table('detail_pengguna')
                    ->join('penggunas', 'penggunas.id', '=', 'detail_pengguna.id_pengguna')
                    ->join('alats', 'alats.id', '=', 'detail_pengguna.id_alat')
                    ->join('tas', 'tas.id', '=', 'detail_pengguna.id_tas')->get();
        $totalpinjam = DB::table('penggunas')
             ->select(DB::raw('count(*) as per, nim as nim'))
             ->groupBy('nim')
             ->where('penggunas.nim',$id)
             ->get();
        $queries = DB::getQueryLog();
        return view('pengguna.detail',compact('pengguna','detail','totalpinjam'))->with('i');
    }
}
