<?php
$file = $_GET['file'];
$directory = $_GET['directory'];
$filext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
$filnme = strtolower(pathinfo($file,  PATHINFO_FILENAME));
$dir = "media/$directory/";
$root = $_SERVER['DOCUMENT_ROOT'];
$uri = $_SERVER['REQUEST_URI'];
$linkonly = substr($uri, 0, strpos($uri, "?"));
?>
<title><?php echo $file; ?></title>
<h1  style="text-align:left">
<a class="back" href="?folder=<?php echo $directory;  ?>"><span class="material-symbols-outlined">arrow_back</span></a> <?php include("loaders/footer.php"); ?>
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
switch ($filext) {
    case 'txt':
    case 'html':
    case 'htm':
    case 'php':
    case 'json':
    case 'js':
    case 'md':
    case 'css':
    case 'sh':
    case 'cpp':
        $filetype = '0';
        break;
    case 'png':
    case 'jpg':
    case 'jpeg':
    case 'gif':
    case 'webp':
    case 'svg':
        $filetype = '1';
        break;
    case 'mp4':
    case 'webm':
        $filetype = '2';
        break;
    case 'mp3':
    case 'ogg':
        $filetype = '3';
        break;
    case 'pdf':
        $filetype = '4';
        break;
    default:
        // Handle unknown extensions appropriately (e.g., set a default or throw an exception)
        $filetype = 'null';  // Example default
}
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
?>
<br><br>
</div>
