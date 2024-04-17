<?php
$logs = $_GET['logs'];
$logs = preg_replace('~\D~', '', $logs);

if (!empty($logs)) {} else {
$logs = "20";
}

if ($logs < "10") {
$logs = "10";
}

if ($logs > "100") {
$logs = "100";
}

include ("../php/enc-set.php");


$root = $_SERVER['DOCUMENT_ROOT'];
include ("isowner.php");
if ($isowner === "true") {
  $file = file_get_contents($logfile); // Read the file content into a string

  // Assuming you have already defined $ciphering, $key, $options, and $encryption_iv
  $decrypt = openssl_decrypt($file, $ciphering, $key, $options, $encryption_iv); // Decrypt the file content

  $logsArray = explode("\n", $decrypt); // Split the decrypted content into an array of logs

  $startIndex = max(0, count($logsArray) - $logs); // Calculate the starting index for displaying logs

  // Iterate over logs starting from the calculated index
  for ($i = $startIndex; $i < count($logsArray); $i++) {
    echo $logsArray[$i] . "\n"; // Output each log
  }

} else {
header("HTTP/1.0 404 Not Found");
}

?>
