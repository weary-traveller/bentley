<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Spatie\ArrayToXml\ArrayToXml;
use App\Imports\ExcelImport;
use App\Exports\ExcelExport;
use App\ExcelFile;
use Excel;

class UploadFileController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {
      return view('uploadfile');
    }


   /**
    * function to upload excel file and insert data into DB
    */
   public function UploadFileData(Request $request)
    {
      
      $validatedData = $request->validate([
        'import_file' => 'required|mimes:xls,xlsx',
        ]);

        if ($request->hasFile('import_file')) {

          $path = $request->file('import_file')->getRealPath();
          $data = Excel::import(new ExcelImport, $request->file('import_file'));
          return redirect()->route('displaydata');
        }
        return back();
    }


    /**
    * function to display all data from DB
    */
    public function DisplayFileData()
    {
      $excel_data_combined = ExcelFile::all();
          return view('display_data', compact('excel_data_combined'));
      }

    /**
    * function to download all data from DB in excel file
    */
     public function DownloadFileData()
     {
     	return Excel::download(new ExcelExport, 'export.xlsx')->deleteFileAfterSend(true);
     }

     /**
    * function to display the file download page
    */
     public function DownloadFileDataDisplay()
     {
      return view('download_data');
     }

     
    /**
    * function to delete individual entry from DB
    */
    public function DeleteFileData(Request $request)
    {
    	$delete_id = $request->input('cancel');
    	$delete = ExcelFile::find($delete_id)->delete();
    	return redirect()->route('displaydata');
    }

    /**
    * function to display the indvidual entry update page
    */
    public function DisplayUpdateFileData(Request $request, $id)
    {
		$update_data = ExcelFile::where('id', '=', $id)->first();
    	return view('update_data', compact('update_data'));
    }

    /**
    * function to update individual entry in DB
    */
    public function UpdateFileData(Request $request)
    {
    	$update_id = $request->input('id');
    	
      ExcelFile::where('id', $update_id)
          ->update([
            'data_id' => $request->input('data_id'),
      			'building_name' =>$request->input('building_name'),
      			'floor_number' => $request->input('floor_number'),
      			'room_number' => $request->input('room_number'),
      			'capacity' => $request->input('capacity')
            ]);

    	$update_data = ExcelFile::where('id', '=', $update_id)->first();
    	return redirect()->route('displaydata');
    }

    /**
    * function to display the individual entry add page
    */
    public function DisplayAddFileData()
    {
    	return view('add_data');
    }

    /**
    * function to add individual entry to DB
    */
    public function AddFileData(Request $request)
    {
      $validatedData = $request->validate([
        'data_id' => 'required|integer',
        'building_name' => 'required|string',
        'floor_number' => 'required|integer',
        'room_number' => 'required|string',
        'capacity' => 'required|integer',
        ]);

    	$file_data = new ExcelFile;
    	$file_data->data_id        = $request->data_id;
    	$file_data->building_name  = $request->building_name;
    	$file_data->floor_number   = $request->floor_number;
    	$file_data->room_number    = $request->room_number;
    	$file_data->capacity       = $request->capacity;
    	$file_data->save();

    	return redirect()->route('displaydata');
    }

}
