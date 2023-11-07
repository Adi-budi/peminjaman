<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Exports\ExportUsers;
use App\Imports\ImportUsers;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function index() 
    {
        $accounts = Account::latest()->get();
        return view('excel.index',compact('accounts'))->with('i');
    }

    public function export() 
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }

    public function import() 
    {
        Excel::import(new ImportUsers, request()->file('file'));
            
        return back();
    }
}
