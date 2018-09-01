<?php

namespace App\Services;

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;

class ExcelService
{
    public function validate($file, $header)
    {
        $errors = array();
        $fileType = IOFactory::identify($file);
        $reader = IOFactory::createReader($fileType);
        $spreadsheet = $reader->load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);
        $rowErrors = "";
        // Check Header File
        for ($col = 1; $col <= $highestColumnIndex; ++$col) {
            $cellColumn = $worksheet->getCellByColumnAndRow($col, 1)->getColumn();
            $cellValue = $worksheet->getCellByColumnAndRow($col, 1)->getValue();

            if (array_key_exists($cellColumn, $header) && $header[$cellColumn] != $cellValue) {
                $rowErrors .= "Invalid header column name " . $cellValue . ", ";
            }
        }
        if ($rowErrors != "") {
            $rowErrors = substr($rowErrors, 0, strlen($rowErrors) - 2);
        }
        $errors[1] = $rowErrors;
        for ($row = 2; $row <= $highestRow; ++$row) {
            $rowErrors = "";
            for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                // Check if header has Star where should be required value.
                $cellValue = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                $headerValue = $worksheet->getCellByColumnAndRow($col, 1)->getValue();
                if (strlen($headerValue) && $this->hasStar($headerValue))
                    if ($cellValue == "")
                        $rowErrors .= "Missing value in " . $this->removeStarAndHash($headerValue) . ", ";

                // Check if header has hash where should be has not contains any spaces.
                if (strlen($headerValue) && $this->hasHash($headerValue)) {
                    if ($this->hasSpace($cellValue)) {
                        $rowErrors .= $this->removeStarAndHash($headerValue) . " should not contain any space, ";
                    }
                }
            }
            if ($rowErrors != "") {
                $rowErrors = substr($rowErrors, 0, strlen($rowErrors) - 2);
            }
            $errors[$row] = $rowErrors;
        }
        return $errors;
    }

    private function removeStarAndHash($str)
    {
        if (strpos($str, "#") !== false) {
            $str = substr($str, 1);
        }
        if (strpos($str, "*") !== false) {
            $str = substr($str, 0, -1);
        }
        return $str;
    }

    private function isHeader(Row $row)
    {
        return $row->getRowIndex() == 1;
    }

    private function hasSpace($str)
    {
        return strpos($str, ' ');
    }

    private function hasStar($str)
    {
        return substr($str, -1, 1) == "*";
    }

    private function hasHash($str)
    {
        return $str[0] == "#";
    }
}
