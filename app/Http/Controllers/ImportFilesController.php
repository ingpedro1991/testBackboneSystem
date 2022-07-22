<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\ZipCodesImport;

class ImportFilesController extends Controller
{
    public function import(){
        return view('zip_codes.import');
    }

    public function importData(Request $request){
        Excel::import(new ZipCodesImport, $request()->file('file'));

        Flash::success('File Zip Code upload successfully.');

        return redirect(route('zipCodes.index'));
    }
}
