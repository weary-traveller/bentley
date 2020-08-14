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

class DataServiceController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    /**
    * function to display Data Service input page
    */
    public function DataService(Request $request)
    {
    	return view('data_service');
    		
    }

    /**
    * function to return data based on input parameter
    */
    public function DataServiceReturn(Request $request)
    {

      $validatedData = $request->validate([
        'data_id' => 'required|integer',
        'output_type' => 'required|in:XML,HTML,JSON',
        ]);

      $data_id = $request->input('data_id');
      $output_type = $request->input('output_type');

      if ($output_type =='XML') {
        $output_data = DB::table('excel_files')->where('data_id', '=', $data_id)->get();
        $output_data = json_decode(json_encode($output_data), true);
        $xml = new \DOMDocument();

        $rootNode = $xml->appendChild($xml->createElement("items"));

        foreach ($output_data as $output) {
            if (! empty($output)) {
                $itemNode = $rootNode->appendChild($xml->createElement('item'));
                foreach ($output as $k => $v) {
                    $itemNode->appendChild($xml->createElement($k, $v));
                }
            }
        }
        $xml->formatOutput = true;

        $backup_file_name = 'datafile_' . time() . '.xml';
        $xml->save($backup_file_name);

          
        header('Content-Type: application/xml');
        // header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
        // ob_clean();
        flush();
        readfile($backup_file_name);
      }


    	if ($output_type =='HTML') {
    		$output_data = DB::table('excel_files')->where('data_id', '=', $data_id)->get();
    		return view('display_data_service', compact('output_data'));
    	}



    	else if ($output_type =='JSON') {
    		$output_data = DB::table('excel_files')->where('data_id', '=', $data_id)->get()->toJson(JSON_PRETTY_PRINT);
    		return response($output_data, 200);	
    	}
    	
    }

}
