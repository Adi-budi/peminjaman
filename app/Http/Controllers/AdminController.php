<?php

namespace App\Http\Controllers;
use App\Models\Pengguna;
use App\Models\DetailPengguna;
use App\Models\Alat;
use App\Models\Tas;
use App\Models\DetailTas;
use DB;
use Carbon\Carbon;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

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
        $tas = DB::table('detail_tas')
            ->join('tas', 'tas.id', '=', 'detail_tas.tas')
            ->select("detail_tas.*", "tas.label","tas.id")
            ->whereNull('tgl_kembali')
            ->groupBy("detail_tas.tas")->get();
        $ruangan = Ruang::latest()->get();
        $pengguna_selesai = DB::table('penggunas')->whereDate('created_at', Carbon::today())->orderBy('updated_at', 'desc')->get();
        $pengguna = DB::table('penggunas')
                    ->select('nim', DB::raw('count(*) as total'))
                    ->groupBy('nim')
                    ->get();

        $nim = Pengguna::select('nim', 'nama')->groupBy('nim')->get();
        // dd($pengguna);
        return view('dashboard2',compact('tas','ruangan','totaltahun','pengguna_selesai','pengguna', 'nim'))->with('i');
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
            $flight->ruangan = $request->ruangan;
            $flight->save();

        // $barang = Alat::find($flight->alat);

        //     $barang->status_alat = 1;
        //     $barang->save();
   
        // return redirect()->route('dashboard')->with('success','Pengguna Berhasil ditambah');
        return "sukeees";
    }
    public function dashboardLain(){
        $totaltahun = DB::table('penggunas')
             ->select(DB::raw('count(*) as per, YEAR( created_at ) as tahun'))
             ->groupBy('tahun')
             ->get();
             // var_dump($totaltahun);
        $pengguna = DB::table('penggunas')->whereDate('created_at', Carbon::today())->orderBy('created_at', 'desc')->get();

        $tas = DB::table('detail_tas')
            ->join('tas', 'tas.id', '=', 'detail_tas.tas')
            ->select("detail_tas.*", "tas.label","tas.id")
            ->whereNull('tgl_kembali')
            ->groupBy("detail_tas.tas")->get();
        $alat = Alat::all();
        $jumlahkan = DB::table('detail_pengguna')
            ->select('id_alat', DB::raw('count(*) as total'))
            ->whereNull('tgl_kembali')
            ->groupBy('id_alat')->get();
        return view('dashboard',compact('pengguna','totaltahun', 'tas', 'alat','jumlahkan'))->with('i');
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

    public function respon()
    {
        $id = Pengguna::latest()->first();
        $data = DetailPengguna::where("id_pengguna", $id->id)->first();
        // dd($data);
        if($data){
            return "isi lagi";
        }else{
            return $id;
        }
    }
    public function getnim(Request $request){
        $data = Pengguna::All()->where('nim',$request->nim);
        return response()->json($data);
    }
    public function getsemuadatapengguna($id= 0){
        // $id ="121711011";
        $data = Pengguna::latest()->where('nim',$id)->first();
        return response()->json($data);

    }

    public function cekAlat(Request $request)
    {
        $data = DetailTas::where("tas", $request->id)->get();
        return $data;
    }

    public function store_detail(Request $request)
    {
        for ($i=0; $i < count($request->isi); $i++) { 
            $detail = new DetailPengguna;
            $detail->id_pengguna = $request->id_pengguna;
            $detail->id_alat = $request->isi[$i];
            $detail->id_tas = $request->id_tas;
            $detail->save();

        }
        $values = DetailTas::where('tas', $detail->id_tas)->update(['tgl_kembali'=> new DateTime()]);
        return redirect()->route('dashboard2')->with('success','Pengguna Berhasil ditambah');
    }
    public function hapus($id){
            
        //get post by ID
        $post = Pengguna::findOrFail($id);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
