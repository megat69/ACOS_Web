<?php
	$data = explode('ACOSENTER_CHAR', htmlspecialchars($_GET['data']));
	$filename = htmlspecialchars($_GET['filename']).'.txt';
	fwrite(fopen($filename, 'w'), utf8_encode($data[0]));
	for ($i=1; $i < count($data); $i++) { 
		fwrite(fopen($filename, 'a'), PHP_EOL.utf8_encode($data[$i]));
	}
	//file_put_contents(htmlspecialchars($_GET['filename']).'.txt', $data);
	header('Content-Type: application/octet-stream');
	header("Content-Transfer-Encoding: Binary"); 
	header("Content-disposition: attachment; filename=\"" . basename($filename) . "\""); 
	readfile($filename); 

	exit();