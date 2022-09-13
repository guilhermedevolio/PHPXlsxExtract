<?php
    require_once './PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';

    $files = scandir('./arquivos');

    foreach ($files as $index => $file) {

        if(!preg_match("/(\.xls)/", $file)) {
            continue;
        }

        $inputFileName = "arquivos/" . $file;

        try {
            $inputFileType = PHPExcel_IOFactory::identify("samba/eae/teste.xls");
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
    
        $sheet = $objPHPExcel->getSheet(0); 
        $highestRow = $sheet->getHighestRow(); 
        $highestColumn = $sheet->getHighestColumn();
    
        for ($row = 1; $row <= $highestRow; $row++){ 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                            NULL,
                                            TRUE,
                                            FALSE);
    
            foreach ($rowData as $key => $value) {
                $file = fopen('codigos.txt', 'a+');
                fwrite($file, <file>);
            }
        }
    }

    
?>
