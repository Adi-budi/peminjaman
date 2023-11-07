<?php

namespace App\Http\Controllers;
use App\Models\Pengguna;
use App\Models\Alat;
use DB;
use Carbon\Carbon;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        // if(Auth::check())
        // {
        $totaltahun = DB::table('penggunas')
             ->select(DB::raw('count(*) as per, YEAR( created_at ) as tahun'))
             ->groupBy('tahun')
             ->get();
             // var_dump($totaltahun);
        $alat = DB::table('alats')->where('status_alat',0)->get();
        $ruangan = Ruangan::latest()->get();
        $pengguna_selesai = DB::table('penggunas')->whereDate('created_at', Carbon::today())->get();
        $pengguna = DB::table('penggunas')->where('status',0)->whereDate('created_at', Carbon::today())->get();
        return view('dashboard2',compact('alat','ruangan','totaltahun','pengguna_selesai','pengguna'))->with('i');
        // }

        // return redirect()->route('login')
        //     ->withErrors([
        //     'email' => 'Please login to access the dashboard.',
        // ])->onlyInput('email');
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
   
        return redirect()->route('dashboard')->with('success','Pengguna Berhasil ditambah');
    
    }
    public function dashboardLain(){
        $totaltahun = DB::table('penggunas')
             ->select(DB::raw('count(*) as per, YEAR( created_at ) as tahun'))
             ->groupBy('tahun')
             ->get();
             // var_dump($totaltahun);
        $pengguna = DB::table('penggunas')->whereDate('created_at', Carbon::today())->get();
        return view('dashboard',compact('pengguna','totaltahun'))->with('i');
    }
    public function ubahstatus1(Request $request,$id,$id_barang){
        $flight = Pengguna::find($id);
            $flight->status = 1;
            $flight->save();

        $barang = Alat::find($id_barang);
            $barang->status_alat = 0;
            $barang->save();
        return redirect()->route('dashboard')->with('success','Status Berhasil diubah');

    }
}
