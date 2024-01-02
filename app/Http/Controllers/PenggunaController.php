<?php

namespace App\Http\Controllers;
use App\Models\Pengguna;
use App\Models\Alat;
use DB;
use App\Models\Ruang;
use App\Models\DetailPengguna;
use App\Models\DetailTas;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DateTime;
use Carbon\Carbon;
use App\Exports\ExportPengguna;
use App\Exports\ExportPenggunaTahunan;
use App\Exports\ExportPenggunaHarian;
use Maatwebsite\Excel\Facades\Excel;

class PenggunaController extends Controller
{
    public function index() {
        // SELECT YEAR(penggunas.created_at) AS tahun FROM `penggunas` GROUP BY tahun;
        $tahun = DB::table('penggunas')
                ->selectRaw('YEAR(created_at) as year')
                ->groupBy("year")
                ->get();
        $pengguna = Pengguna::latest()->get();
        $pengguna2 = DB::table('penggunas')
            ->join('ruangans', 'penggunas.ruangan', '=', 'ruangans.id')
            ->join('detail_pengguna','penggunas.id','=','detail_pengguna.id_pengguna')
            ->select('penggunas.*', 'ruangans.nama_ruang','detail_pengguna.id_tas')
            ->groupBy("penggunas.id")
            ->orderBy('created_at', 'desc')->get();
        // dd($pengguna2);
        return view('pengguna.index',compact('pengguna','pengguna2','tahun'))->with('i');
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
    public function storeedit($id, Request $request){
            $peng = Pengguna::find($id);
            $peng->nim = $request->nim;
            $peng->nama = $request->nama;
            $peng->nomor_telp = $request->nomor_telp;
            $peng->save();
            // dd($peng);

        return redirect()->route('pengguna')->with('success','Pengguna Berhasil diubah');
    }
    public function ubahstatus1(Request $request,$id,$id1){
        $flight = Pengguna::find($id);
            $flight->tgl_kembali = new DateTime();
            $flight->save();
        $values1 = DetailPengguna::where('id_pengguna', $id)->update(['tgl_kembali'=> new DateTime()]);
        $values = DetailTas::where('tas', $id1)->update(['tgl_kembali'=> Null]);
        return redirect()->route('pengguna')->with('success','Status Berhasil diubah');

    }
    public function ubahstatus0(Request $request,$id,$id1){
            $flight = Pengguna::find($id);
            $flight->tgl_kembali = null;
            $flight->save();
        $values1 = DetailPengguna::where('id_pengguna',$id)->update(['tgl_kembali'=> Null]);
        $values = DetailTas::where('tas',$id1)->update(['tgl_kembali'=> new DateTime()]);
        return redirect()->route('pengguna')->with('success','Status Berhasil diubah');
    }
    public function exportAll(){
        return Excel::download(new ExportPengguna, 'Pengguna.xlsx');
    }
    public function exportByTahun(Request $request){
        return Excel::download(new ExportPenggunaTahunan($request->tahun), 'PenggunaTahun-'.$request->tahun.'.xlsx');

    }
    public function exportByHari(Request $request){

        $document_name1 = str_replace(array("/", "\\", ":", "*", "?", "«", "<", ">", "|"), "-", $request->date1);
        $document_name2 = str_replace(array("/", "\\", ":", "*", "?", "«", "<", ">", "|"), "-", $request->date2);
        $a = Carbon::parse($document_name1)->toFormattedDateString();
        $b = Carbon::parse($document_name2)->toFormattedDateString();
        return Excel::download(new ExportPenggunaHarian(), 'Pengguna '.$a."-".$b.'.xlsx');

    }
    public function detail($id){
        $pengguna = Pengguna::where('nim',$id)
                    ->join('detail_pengguna', 'detail_pengguna.id_pengguna', '=', 'penggunas.id')
                    ->join('tas', 'tas.id', '=', 'detail_pengguna.id_tas')
                    ->join('ruangans', 'ruangans.id', '=', 'penggunas.ruangan')
                    ->groupBy("penggunas.id")
                    ->select("penggunas.*", "ruangans.nama_ruang", "tas.label")
                    ->orderBy('created_at', 'desc')
                    ->get();
        // dd($day);

        DB::connection()->enableQueryLog();
        $detail = DB::table('detail_pengguna')
                    ->join('penggunas', 'penggunas.id', '=', 'detail_pengguna.id_pengguna')
                    ->join('alats', 'alats.id', '=', 'detail_pengguna.id_alat')
                    ->join('tas', 'tas.id', '=', 'detail_pengguna.id_tas')
                    ->where('nim',$id)->get();
        $totalpinjam = DB::table('penggunas')
             ->select(DB::raw('count(*) as per, nim as nim'))
             ->groupBy('nim')
             ->where('penggunas.nim',$id)
             ->get();
        $queries = DB::getQueryLog();
        return view('pengguna.detail',compact('pengguna','detail','totalpinjam'))->with('i');
    }
}
