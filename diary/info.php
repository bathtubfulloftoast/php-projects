<?php
include('php/logging.php');
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

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
$domain = $_SERVER['HTTP_HOST'];

$path = str_replace("/info.php", "", $request);

$port = $_SERVER['SERVER_PORT'];

$uag = $_SERVER['HTTP_USER_AGENT'];

$password = $_SERVER['PHP_AUTH_PW'];

header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=info.txt");
echo 
"ip: $client_ip
user: $user
password: $password
host: $domain
protocol: $protocol
path: $path
port: $port
agent: $uag
";

?>
-------------------------------------------------------
info for user of Novas PHP Diary