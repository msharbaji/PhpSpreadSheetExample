## PhpSpreadSheet with Laravel Example

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects.

The PhpSpreadsheet is a library written in pure PHP and providing a set of classes that allow you to read from and to write to different spreadsheet file formats, like Excel and LibreOffice Calc.

## About The Problem
This Problem to	validate excel file format and its data. For this exercise, you will have to validate two type of excel file Type_A and Type_B .

###### General Rules:
1. Column name that starts with # should not contain	any space.
2. Column name that	ends with  * is a required column, means it must have a value.
3. For each	file type, it should validate the header columns name and the amount of columns	it has
    - For example, Type_A file should only contains 5 columns and the header column name should be and follows the following order
        1. Field_A*
        2. #Field_B
        3. Field_C
        4. Field_D*
        5. Field_E*
4. The package should be able to validate both .xls and .xlsx file.
