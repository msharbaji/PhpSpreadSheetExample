<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Services\ExcelService;

class TypeCController implements Controller
{
    //
    protected $excelService;
    protected static $header = ['A' => 'Field_A*', 'B' => 'Field_B' ,'C' => '#Field_C',
        'E' => '#Field_D' , 'D' => '#Field_E*', 'F' => ''];

    public function __construct(ExcelService $excelService)
    {
        $this->excelService = $excelService;
    }

    public function process($file){
        $results = $this->excelService->validate($file,TypeCController::$header);
        return $results;
    }
}
