<?php
$file = $_GET['file'];
$nuhuh = str_replace('..', 'null', $file);
$nuhuh = str_replace('./', 'null', $nuhuh);
$file_url = "../$nuhuh";
if (file_exists($file_url)) {
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"" . basename("$file_url") . "\"");
readfile($file_url);
} else {
    header("HTTP/1.0 404 Not Found");
}
?>
