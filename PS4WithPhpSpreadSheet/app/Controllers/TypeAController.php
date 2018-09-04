<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Services\ExcelService;

class TypeAController implements Controller
{
    //
    protected $excelService;
    protected static $header = ['A' => 'Field_A*', 'B' => '#Field_B', 'C' => 'Field_C',
        'D' => 'Field_D*', 'E' => 'Field_E*'];

    public function __construct(ExcelService $excelService)
    {
        $this->excelService = $excelService;
    }

    public function process($file){
        $results = $this->excelService->validate($file,TypeAController::$header);
        return $results;
        // return "sss";
    }
}
