<?php
session_start();
if(!isset($_SESSION['data'])){
	require('phpexcel/Classes/PHPExcel.php');
	$objReader = PHPExcel_IOFactory::createReader('Excel2007');
	$objReader->setReadDataOnly(true);
	$objPHPExcel = $objReader->load('data.xlsx');
	$objWorksheet =  $objPHPExcel->getActiveSheet(); 
	$highestRow = $objWorksheet->getHighestRow(); 
	$highestColumn = $objWorksheet->getHighestColumn(); 
	$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); 
	$arr_return = [];
	for ($row = 3; $row <= $highestRow; ++$row) {
		if(!is_null($objWorksheet->getCellByColumnAndRow(1, $row)->getValue())){
			$arr_temp = [];
		    for ($col = 0; $col <= $highestColumnIndex; ++$col) {
		 		$arr_temp[] = $objWorksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();                         
		    }
		    unset($arr_temp[17]);
		    $arr_return[] = $arr_temp;
		}
	}
	$_SESSION['data'] = $arr_return;
}


// echo "<pre>";
// print_r($arr_return);
// echo "</pre>";

echo json_encode($_SESSION['data']);