<?php

namespace App\Http\Controllers;

use App\Services\ExcelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TypeAController extends Controller
{
    //
    protected $excelService;
    protected $file;
    protected static $header = ['A' => 'Field_A*', 'B' => '#Field_B', 'C' => 'Field_C',
        'D' => 'Field_D*', 'E' => 'Field_E*'];

    public function __construct(ExcelService $excelService)
    {
        $this->excelService = $excelService;
        $this->file = storage_path('app/public/Type_A.xlsx');
    }

    public function process(){
        $results = $this->excelService->validate($this->file,TypeAController::$header);
//        return $results;
        return view('typeA', compact('results'));
    }
}
