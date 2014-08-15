<?php
session_start();

$mt=explode(" ",microtime());
$mt[0]=explode(".",$mt[0]);
$mt=$mt[1].".".$mt[0][1];

$path = "/tmp/";

$id = session_id();

if(isset($_POST["block"])){ // Process block-page uploads

	$data = urldecode($_POST["block"]);
	if($data != strip_tags($data) && strlen($data) <= 1000000 ) { // contains HTML tags and is less than 1MB

 	// Strip non-alphanumeric chars from filename, and truncate at 20 chars
	$file_name = substr(preg_replace("/[^A-Za-z0-9 ]/", '', $_POST["name"]),0,20);

	// Write to file in temp
	$file_path = $path.'block-'.$id.'-'.$file_name.'-'.$mt.'.html';
	file_put_contents($file_path, $data);
}
} elseif(isset($_POST["dom"])){ // Process uploaded report

	$data = urldecode($_POST["dom"]);
	if($data != strip_tags($data) && strlen($data) <= 1000000 ) { // contains HTML tags and is less than 1MB

	// Write to file in temp
	$file_path = $path.'dom-'.$id.'-'.$mt.'.html';
	file_put_contents($file_path, urldecode($data));
}
} else {
	// Do nothing
}


?>
