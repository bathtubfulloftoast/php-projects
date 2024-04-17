<?php
ini_set('memory_limit', '512M');
ini_set('max_execution_time', 300); // 300 seconds (5 minutes)

// include('../php/logging.php');
// commented because i cant make it work without knowing the exact directory its being located in
// feature not fully ready.
$file = $_GET['file'];
$date = $_GET['date'];

$MURIKA = str_replace('.', '/', $date);
$year = date("Y", strtotime($MURIKA));
$day = date("j", strtotime($MURIKA));
$month = date("n", strtotime($MURIKA));
$dateonly = "$month.$day";
$yearonly = "$year";
$path = "entries/$yearonly/$dateonly$file/";

$file_url = "entries/$yearonly/$dateonly$file/";
$file_url = str_replace('../', 'null', $file_url);
$file_url = str_replace('./', 'null', $file_url);
$file_url = "../$file_url";

$date = date('n/j/Y');
//$randomnumber = (rand(0, 999999));

$user = $_SERVER['PHP_AUTH_USER'];

if (!empty($user)) {} else {
$user = "No User";
}

$base64 = base64_encode("$date - $user");
$content = str_replace('=', '', $base64);

// Important: You should have read and write permissions to read
// the folder and write the zip file

$zipArchive = new ZipArchive();
$zipFile = "zip/$content.zip";
$zipName = basename($path);

if (file_exists($zipFile)) {
    // File exists, stop execution with the message
    die("Server Is Busy<br>Try Again Later.");
}

if ($zipArchive->open($zipFile, ZipArchive::CREATE) !== TRUE) {
    exit("Unable to open file.");
}
$folder = "$file_url";
createZip($zipArchive, $folder, '');
$zipArchive->close();

function createZip($zipArchive, $folder, $parent)
{
    if (is_dir($folder)) {
        if ($f = opendir($folder)) {
            while (($file_url = readdir($f)) !== false) {
                if ($file_url != '.' && $file_url != '..') {
                    if (is_file($folder . '/' . $file_url)) {
                        $zipArchive->addFile($folder . '/' . $file_url, $parent . $file_url);
                    } elseif (is_dir($folder . '/' . $file_url)) {
                        createZip($zipArchive, $folder . '/' . $file_url, $parent . $file_url . '/');
                    }
                }
            }
            closedir($f);
        } else {
            //exit("Unable to open directory " . $folder);
                header("HTTP/1.0 404 Not Found");
        }
    } else {
        //exit($folder . " is not a directory.");
            header("HTTP/1.0 404 Not Found");
    }
}

header("Content-type: application/zip");
header("Content-Disposition: attachment; filename=$zipName.zip");
header("Pragma: no-cache");
header("Expires: 0");
readfile("$zipFile");

unlink($zipFile)
?>
