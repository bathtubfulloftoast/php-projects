<h1><?php echo "$file"; ?></h1>
<?php echo "<img class='filecontentborder' src='$dir$file'>";?>
<?php
list($width, $height, $type, $attr) = getimagesize("$dir$file");
list($width, $height) = getimagesize("$dir$file");
if ($filext == "svg") {
} else {
    $customfileinfo = "Resolution: $width x $height";

}
?>
