<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


// Utility function to return json, given a keyed array
function jsonResponse($array) {
	header('Content-Type: application/json');
	return json_encode($array);
}


if (isset($_FILES['file']['name'])) {

	//replace the ' '(space) in filename with '-'
	$fileName = str_replace(' ', '-', strtolower($_FILES['file']['name']));
	$fileName = str_replace('_', '-', strtolower($_FILES['file']['name']));

	//find the position of '.' in the filename and return the extension
	$fileExtSep = substr($fileName, strrpos($fileName, '.'));
	//remove the '.' from the extension
	$fileExt = str_replace('.', '', $fileExtSep);

	//compare for the correctness of the extension
	if ($fileExt == 'xls'||$fileExt == 'xlsx'||$fileExt == 'csv'){
		//remove any special symbols if present in the current filename
		$fileName = preg_replace("/\.[^.\s]{3,4}$/", "", $fileName);
		$RandomNum = rand(11111, 99999);
		//create a filename of form "name-randomnumber.extension"
		$NewfileName = $fileName . '-' . $RandomNum . '.' . $fileExt;

		//specify the upload location for file
			$Destination = 'uploads/';

		$oldmask = umask(0);
		!is_dir($Destination) && mkdir($Destination, 0777) && umask($oldmask) && chmod($Destination, 0777);

		$oldmask = umask(0);
		!is_dir($Destination) && mkdir($Destination, 0777) && umask($oldmask) && chmod($Destination, 0777);

		//move the new file to uploads folder
		$uploaded = move_uploaded_file($_FILES['file']['tmp_name'], "$Destination/$NewfileName");

		if (!$uploaded) {
			echo jsonResponse(array("success" => false, "error" => "Some error occured while uploading!", "refresh" => false));

		}else{

			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("uploads/".$NewfileName);
			$sheet = $spreadsheet->getActiveSheet();
			$highestColumn = $sheet->getHighestColumn();
			$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

			echo jsonResponse(array("success" => true, "filename" => $NewfileName, "fields" => $highestColumnIndex));
		}

	}//incase of wrong extension
	else {
		echo jsonResponse(array("success" => false, "error" => "File Type Issue", "refresh" => false));
	}
}//incase of improper filename
else {
	echo jsonResponse(array("success" => false, "error" => "Unsuccessful!", "refresh" => false));
}


?>