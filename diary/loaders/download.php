<?php
// include('../php/logging.php');
// commented because i cant make it work without knowing the exact directory its being located in
// feature not fully ready.
$file = $_GET['file'];
$date = $_GET['date'];




$MURIKA = str_replace('.', '/', $date);
$year = date("Y", strtotime($MURIKA));
$day = date("j", strtotime($MURIKA));
$month = date("n", strtotime($MURIKA));


$flee = "entries/$year/$month.$day$file";



$file_url = str_replace('../', 'null', $flee);
$file_url = str_replace('./', 'null', $file_url);
$file_url = "../$file_url";
$filename = basename($file_url);


if (file_exists($file_url)) {
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"$filename\"");
readfile($file_url);

} else {
    header("HTTP/1.0 404 Not Found");
}
?>
