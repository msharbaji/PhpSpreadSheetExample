<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExcelService;

class TypeCController extends Controller
{
    //
    protected $excelService;
    protected $file;
    protected static $header = ['A' => 'Field_A*', 'B' => 'Field_B' ,'C' => '#Field_C',
        'E' => '#Field_D' , 'D' => '#Field_E*', 'F' => ''];

    public function __construct(ExcelService $excelService)
    {
        $this->excelService = $excelService;
        $this->file = storage_path('app/public/Type_C.xlsx');
    }

    public function process(){
        $results = $this->excelService->validate($this->file,TypeCController::$header);
        return view('typeC', compact('results'));
    }
}
