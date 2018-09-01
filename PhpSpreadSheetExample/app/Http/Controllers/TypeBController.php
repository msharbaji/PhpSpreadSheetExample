<?php

namespace App\Http\Controllers;
use App\Services\ExcelService;
use Illuminate\Http\Request;

class TypeBController extends Controller
{
    //
    protected $excelService;
    protected $file;
    protected static $header = ['A' => 'Field_A*', 'B' => '#Field_B'];

    public function __construct(ExcelService $excelService)
    {
        $this->excelService = $excelService;
        $this->file = storage_path('app/public/Type_B.xlsx');
    }

    public function process(){
        $results = $this->excelService->validate($this->file,TypeBController::$header);
        return view('typeB', compact('results'));
    }
}
