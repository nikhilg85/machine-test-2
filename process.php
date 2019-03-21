<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!$_POST || empty($_POST)) {
	die(jsonResponse(array("success" => false, "error" => "Bad Request!")));
}

$file1 = $_POST['files'][0]; //"1.xlsx";
$file2 = $_POST['files'][1]; //"2.xlsx";
$sequence = $_POST['order']; //"Col10,Col9,Col8,Col7,Col6,Col5,Col4,Col3,Col1";

$sequence = preg_replace('/\s+/', '', $sequence);

$seq_array = explode(",",$sequence);



// New Sheet that needs to be exported
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$spreadsheet1 = \PhpOffice\PhpSpreadsheet\IOFactory::load('uploads/'.$file1);

	$sheet1 = $spreadsheet1->getSheet(0); 
	$highestRow1 = $sheet1->getHighestRow(); 
	$highestCol1 = $sheet1->getHighestColumn();
	$highestColumnIndex1 = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestCol1);

	// $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();

// intval()
$filesColsArray = array();
foreach ($seq_array as $value) {
	$int = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
	if ($int > $highestColumnIndex1) {
		$int = $int - $highestColumnIndex1;
		array_push($filesColsArray, '2-'.$int);
	}else{
		array_push($filesColsArray, '1-'.$int);
	}
}




$spreadsheet2 = \PhpOffice\PhpSpreadsheet\IOFactory::load('uploads/'.$file2);
	$sheet2 = $spreadsheet2->getSheet(0); 
	$highestRow2 = $sheet2->getHighestRow(); 
	$highestCol2 = $sheet2->getHighestColumn();
	$highestColumnIndex2 = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestCol2);


	//To get the total number of filled rows for current sheet of 1st File
	$totalrowscurrent1 = 0;
	$sheet1data = $sheet1 -> toArray();
	// echo json_encode($sheet1data);

	
	foreach ($sheet1data as $value1) {
		if (sizeof(array_filter(array_unique($value1), "remove_empty")) > 0) {
			$totalrowscurrent1++;
		}
	}

	if($totalrowscurrent1<1){
		$out = array(
					'success' => false,
					'message' => 'Please Add Data in Excel before Importing'
				);
			echo json_encode($out);
			die();
	}
	$highestRow1 = $totalrowscurrent1+1;

	$data1 = array();
	for ($row = 1; $row <= $highestRow1; $row++){ 
		//  Read a row of data1 into an array
			$rowData1 = $sheet1->rangeToArray('A' . $row . ':'.$highestCol1. $row, NULL, TRUE, FALSE);
			array_push($data1, $rowData1[0]);	
	}

	for ($j=0; $j < count($data1); $j++) {

		if($data1[$j][0] == NULL){
			unset($data1[$j]);
		} 
		
	}

	$filteredData1 = array_values($data1);

	foreach ($filteredData1 as $row => $rowData) {
		foreach ($filesColsArray as $col => $value) {
			$fileNo = explode("-", $value)[0];
			if ($fileNo == 1) {
				$colIndex = explode("-", $value)[1]-1;
				$val = $rowData[$colIndex];
				$sheet->setCellValueByColumnAndRow($col+1, $row+1, $val);
			}
		}
	}

	//To get the total number of filled rows for current sheet of 2nd File
	$totalrowscurrent2 = 0;
	$sheet2data = $sheet2 -> toArray();
	// echo json_encode($sheet2data);

	
	foreach ($sheet2data as $value2) {
		if (sizeof(array_filter(array_unique($value2), "remove_empty")) > 0) {
			$totalrowscurrent2++;
		}
	}

	if($totalrowscurrent2<1){
		$out = array(
					'success' => false,
					'message' => 'Please Add Data in Excel before Importing'
				);
			echo json_encode($out);
			die();
	}
	$highestRow2 = $totalrowscurrent2+1;

	$data2 = array();
	for ($row = 1; $row <= $highestRow2; $row++){ 
		//  Read a row of data2 into an array
			$rowData2 = $sheet1->rangeToArray('A' . $row . ':'.$highestCol2. $row, NULL, TRUE, FALSE);
			array_push($data2, $rowData2[0]);	
	}

	for ($j=0; $j < count($data2); $j++) {

		if($data2[$j][0] == NULL){
			unset($data2[$j]);
		} 
		
	}

	$filteredData2 = array_values($data2);

	foreach ($filteredData2 as $row => $rowData) {
		foreach ($filesColsArray as $col => $value) {
			$fileNo = explode("-", $value)[0];
			if ($fileNo == 2) {
				$colIndex = explode("-", $value)[1]-1;
				$val = $rowData[$colIndex];
				$sheet->setCellValueByColumnAndRow($col+1, $row+1, $val);
			}
		}
	}

	// For Debugging
	// $sheetdata = $sheet -> toArray();
	// echo "<pre>";
	// print_r($sheetdata);
	// echo json_encode($sheetdata);


$RandomNum = rand(11111, 99999);
$Newfile = "outputs/output". "-" . $RandomNum .".xlsx";
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
$writer->save($Newfile);

echo jsonResponse(array("success" => true, "file" => $Newfile));



	// Utility function to return json, given a keyed array
	function jsonResponse($array) {
		header('Content-Type: application/json');
		return json_encode($array);
	}


	function remove_empty($var)
	{
		if (trim($var)) {
			return true;
		}else{
			return false;
		}
	}