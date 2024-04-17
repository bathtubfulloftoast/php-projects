<?php
$root = $_SERVER['DOCUMENT_ROOT'];

include ("php/enc-set.php");
$client_ip = $_SERVER['HTTP_CF_CONNECTING_IP'];


if (!empty($client_ip)) {} else {
$client_ip = $_SERVER['REMOTE_ADDR'];
}

$user = $_SERVER['PHP_AUTH_USER'];

if (!empty($user)) {} else {
$user = "No User";
}

$request = $_SERVER['REQUEST_URI'];
date_default_timezone_set('America/Denver');
$logintime = date('n/j/Y H:i:s');

$logfilename = $logfile;

$txt = "\n$logintime - $client_ip - $user - $request";


$filecontents = file_get_contents($logfilename);
$decryption = openssl_decrypt($filecontents, $ciphering,
            $key, $options, $encryption_iv);
$encryption = openssl_encrypt("$decryption$txt", $ciphering,
            $key, $options, $encryption_iv);

if (isset($_GET['logs'])){} else {
$myfile = fopen("$logfilename", "w") or die("Unable to open file!");
fwrite($myfile, $encryption);
fclose($myfile);
}
?>
