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

?>
<title><?php echo $filnme; ?></title>
<h1  style="text-align:left">
<a class="back" href="?folder=<?php echo $directory;  ?>&date=<?php echo $date;?>"><span class="material-symbols-outlined">arrow_back</span></a> <?php include("loaders/filefooter.php"); ?>
</h1>
<hr class="tophr">
<?php

$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));


if($isMob){



echo '<div class="mobtext">';

}else{

echo '<div class="text">';

}
?>
<?php
include("loaders/filetypes.php");
if (file_exists($dir.$file)) {
if ($filetype == '0') {
include("loaders/text.php");
} elseif ($filetype == '1') {
include("loaders/image.php");
} elseif ($filetype == '2') {
include("loaders/video.php");
} elseif ($filetype == '3') {
include("loaders/audio.php");
} elseif ($filetype == '4') {
include("loaders/pdf.php");
} elseif ($filetype == '5') {
include("loaders/3d.php");
}


elseif ($filetype == 'null') {
if (!empty($filext)) {
include("loaders/unknown.php");
} else {
include("loaders/folder.php");
}
}
} else {
    header("HTTP/1.0 404 Not Found");
}
include("loaders/info.php");
?>
<br><br>
</div>