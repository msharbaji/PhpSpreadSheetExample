<?php
namespace App\Controllers;

use \App\Controllers\Controller;

class ValidateExcelFactory{
    
    protected $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function process($file){
        return $this->controller->process($file);
    }
}