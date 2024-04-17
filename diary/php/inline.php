<?php
$file = $_GET['file'];
$date = $_GET['date'];
$directory = $_GET['directory'];
$filext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
$filnme = pathinfo($file,  PATHINFO_FILENAME);

$MURIKA = str_replace('.', '/', $date);
$year = date("Y", strtotime($MURIKA));
$day = date("j", strtotime($MURIKA));
$month = date("n", strtotime($MURIKA));
$dateonly = "$month.$day";
$yearonly = "$year";

$dir = "entries/$yearonly/$dateonly/$directory/";
$root = $_SERVER['DOCUMENT_ROOT'];
$path = "entries/$yearonly/$dateonly$directory/$file";

$file = $path;
$filename = basename($file);
header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=\"$filename\"");
readfile($file);
?>
