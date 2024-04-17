<?php
$test = 0;
include('php/logging.php');
//this sets the test tag to zero by default
if (file_exists('kill')) {
$kill = 1;
} else {
$kill = 0;
}

if ($kill == 1){
header("HTTP/1.0 401");
die();
};

?>
<?php $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
date_default_timezone_set('America/Denver');
?>
<head>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="custom.css">


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="favicon.ico">
<meta content="#1b141f" data-react-helmet="true" name="theme-color" />



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
<?php if (isset($_GET['entry'])){
  $test = 1;
include ("php/entries.php");
}

if (isset($_GET['year'])){
  $test = 1;
include ("php/year.php");
}

if (isset($_GET['search'])){
  $test = 1;
include ("php/searchpage.php");
}

if (isset($_GET['searchfunc'])){
  $test = 1;
include ("php/search.php");
}

if (isset($_GET['file'])){
  $test = 1;
include ("php/filedisplay.php");
}

if (isset($_GET['folder'])){
  $test = 1;
include ("php/folderview.php");
}


if (isset($_GET['logs'])){
  $test = 1;
include ("php/logview.php");
}

if ($test == 0) {
include ("php/main.php");
}
?>

<script>
console.log("i see you!")
console.log("this is very unprofessional so expect errors")
console.log("if you want to help email me at mail@novassite.net")
</script>


