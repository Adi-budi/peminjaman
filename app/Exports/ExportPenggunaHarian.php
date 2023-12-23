<?php

namespace App\Exports;

use App\Registration;
use Carbon\Carbon;
use App\Models\Pengguna;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportPenggunaHarian implements FromCollection, WithHeadings, WithMapping, WithDrawings,WithStyles,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct() 
    {


    }
    public function collection()
    {
		$startDate = request()->input('date1') ;
        $endDate   = request()->input('date2') ;
        return Pengguna::select("penggunas.nim","penggunas.nama","penggunas.nomor_telp","ruangans.nama_ruang", "tas.label","penggunas.created_at","penggunas.tgl_kembali")
                    ->join('ruangans', 'ruangans.id', '=', 'penggunas.ruangan')
                    ->join('detail_pengguna', 'detail_pengguna.id_pengguna', '=', 'penggunas.id')
                    ->join('alats', 'alats.id', '=', 'detail_pengguna.id_alat')
                    ->join('tas', 'tas.id', '=', 'detail_pengguna.id_tas')
                    ->groupBy("penggunas.id")
                    ->groupBy("penggunas.ruangan")
                    ->whereBetween('penggunas.created_at', [ $startDate, $endDate ] )
                    ->get();
    } 
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/img/LOGO pusat teknologi pembelajaran.png'));
        $drawing->setHeight(70);
        $drawing->setWidth(70);
        $drawing->setCoordinates('A1');
        $drawing->setOffsetX(4);
        $drawing->setOffsetY(9);


        return $drawing;
    }
    public function styles(Worksheet $sheet)
    {

        $sheet->getStyle('A3:H3')->getFont()->setBold(true);
        $sheet->getStyle('B1')->getFont()->setBold(true);
        $sheet->getStyle('B1')->getFont()->setSize(19);
        $sheet->getStyle('B2')->getFont()->setBold(true);
        $sheet->getStyle('B2')->getFont()->setSize(19);
        $sheet->mergeCells('B1:H1');
        $sheet->mergeCells('B2:H2');
        $sheet->mergeCells('A1:A2');


    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('B1:H1')
                                ->getAlignment()
                                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('B1:H1')
                                ->getAlignment()
                                ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);                                
                $event->sheet->getDelegate()->getStyle('B2:H2')
                                ->getAlignment()
                                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(11);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(33);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(50);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(18);
     
            },
        ];
    }
    public function map($Pengguna) : array {
        return [
            $Pengguna->nim,
            $Pengguna->nama,
            $Pengguna->nomor_telp,
            $Pengguna->nama_ruang,
            $Pengguna->label,
            $Pengguna->created_at,
            $Pengguna->tgl_kembali
            // Carbon::parse($Pengguna->created_at)->toFormattedDateString(),
            // Carbon::parse($Pengguna->tgl_kembali)->toFormattedDateString()
        ] ;
 
 
    }
    public function headings(): array
    {
        $startDate = request()->input('date1') ;
        $endDate   = request()->input('date2') ;
        $tglawal = Carbon::parse($startDate)->toFormattedDateString();
        $tglakhir = Carbon::parse($endDate)->toFormattedDateString();
        return [
            [" ","Laporan Peminjaman Proyektor di UPT Laboratorium Terpadu"],
            [" ","Periode $tglawal sampai $tglakhir"],
            ["Nim", "Nama", "Nomor Telephone","Nama Ruangan","Label Tas","Tanggal Pinjam","Tanggal Kembali"]];
    }
}