<?php
$client_ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
$allowed_ips = array("CHANGEME", $customip);
if (in_array($client_ip, $allowed_ips)) {
    $isowner = 'true';
} else {
    $isowner = 'false';
}
?>
