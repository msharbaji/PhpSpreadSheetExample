<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Services\ExcelService;

class TypeBController implements Controller
{
    //
    protected $excelService;
    protected $file;
    protected static $header = ['A' => 'Field_A*', 'B' => '#Field_B'];

    public function __construct(ExcelService $excelService)
    {
        $this->excelService = $excelService;
    }

    public function process($file){
        $results = $this->excelService->validate($file,TypeBController::$header);
        return $results;
    }
}
