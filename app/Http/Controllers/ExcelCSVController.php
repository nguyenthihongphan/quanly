<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\facade\PDF;

class ExcelCSVController extends Controller

{   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importView(Request $request){
        return view('users.search');
    }

    public function importUser(Request $request){
        $data = $request->all();       
        $modelUser = new User();
        $name = $modelUser->getFullName($request->user()->id);
        Log::channel('importExport')->info('Import user data', ['type' => 'importUser', 'user' => $name, 'time' => date('Y-m-d H:i:s')]);       
        Excel::import(new UsersImport, $data['file']);       
        return redirect()->route('search')->with('success', 'import success');    
    }

    public function exportUser(Request $request){
        $data = $request->only('email', 'phone', 'user_flg', 'orderFrom', 'orderTo','information', 'birth');
        $modelUser = new User();
        $name = $modelUser->getFullName($request->user()->id);
        Log::channel('importExport')->info('Export user data', ['type' => 'exportUser', 'user' => $name, 'time' => date('Y-m-d H:i:s')]);
        return Excel::download(new UsersExport($data), 'users.csv');       
    }

    public function exportPDF(Request $request){             
        $data = $request->only('email', 'phone', 'user_flg', 'orderFrom', 'orderTo','information', 'birth');
        $modelUser = new User();  
        $type = 'pdf';
        $name = $modelUser->getFullName($request->user()->id);
        Log::channel('importExport')->info('Export user data', ['type' => 'exportPDF', 'user' => $name, 'time' => date('Y-m-d H:i:s')]);
        $dataExport = $modelUser->search($data,$type);
        $pdf = PDF::loadView('users.exportFile.exportPDF', compact('dataExport'))->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->download('users.pdf');
    }
    
}
