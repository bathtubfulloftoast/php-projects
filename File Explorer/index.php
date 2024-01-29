<?php
$test = 0;
//this sets the test tag to zero by default
?>

<head>
    
<link rel="stylesheet" href="style.css">

<meta name="viewport" content="width=device-width, initial-scale=1">



<!-- Begin Google Shit -->

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<style>
.material-symbols-outlined {
    font-size:30;
  font-variation-settings:
  'FILL' 0,
  'wght' 600,
  'GRAD' 0,
  'opsz' 24
}
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Color+Emoji&display=swap" rel="stylesheet">
<!-- End Google Shit -->

</head>

<?php

if (isset($_GET['file'])){
  $test = 1;
include ("filedisplay.php");
}

if ($test == 0) {
include ("folderview.php");
}
?>

