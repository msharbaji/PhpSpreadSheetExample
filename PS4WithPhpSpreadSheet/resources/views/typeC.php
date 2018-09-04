<?php
require '../../vendor/autoload.php';

use App\Controllers\TypeCController;
use App\Controllers\ValidateExcelFactory;
use App\Services\ExcelService;

$excelService = new ExcelService();
$validateExcelFactory = new ValidateExcelFactory(new TypeCController($excelService));
$results = $validateExcelFactory->process('../statics/Type_C.xlsx');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Avana Test 2</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #080808;
            font-family: 'SansSerif', sans-serif;

        }
        .title{
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 50%;
        }

        table, th, td {
            border: 1px solid black;
        }
        th {
            text-align: left;
        }
        td,th{
            padding: 15px;
        }
        tr:nth-child(even) {background-color: #f2f2f2;}
        .full-height {
            height: 100vh;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="title">
        <h1> Type C </h1>
    </div>
    <div class="content">
        <div class="title m-b-md">
            <table>
                <tr>
                    <th>Row</th>
                    <th>Error</th>
                </tr>
                <?php
                    foreach($results as $key => $value){
                        if($value !== ""){
                            echo "<tr>";
                            echo "<td>".$key."</td>";
                            echo "<td>".$value."</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>