<?php

namespace App\Http\Controllers;
use App\Models\Account;
use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller
{
    public function index() {
        $accounts = Account::latest()->get();
        return view('pdf.index',compact('accounts'))->with('i');
    }

    public function generatePDF(Request $request)
    {
        $data = [
            'title' => 'Welcome to KangLab',
            'name' => $request->name,
            'date' => date('m/d/Y'),
        ];
          
        $pdf = PDF::loadView('myPDF', $data);
    
        return $pdf->download('itsolutionstuff.pdf');
    }
}
