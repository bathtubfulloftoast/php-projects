<h1><?php echo "$file"; ?></h1>
<audio controls src="<?php echo $dir.$file; ?>"></audio>
<br>
<?php
//you will need mediainfo installed on your server to let this run
//if you cant or dont want to remove this entire section
$json = shell_exec("mediainfo --output=JSON \"$path\"");
$decodedData = json_decode($json, true);

// Access the first track
$Trackinfo = $decodedData['media']['track'][0];


if (!empty($Trackinfo['Title'])) {
$tracktitle = "Title: ".$Trackinfo['Title']."<br>";
}

if (!empty($Trackinfo['Album'])) {
$trackalbum =  "Album: ".$Trackinfo['Album']."<br>";
}

if (!empty($Trackinfo['Performer'])) {
$trackartist =  "Artist: ".$Trackinfo['Performer']."<br>";
}

if (!empty($Trackinfo['Track_Position'])) {
$tracknumber = $Trackinfo['Track_Position'];
} else {
$tracknumber = "0";
}
if (!empty($Trackinfo['Track_Position_Total'])) {
$tracknumbertotal = $Trackinfo['Track_Position_Total'];
} else {
$tracknumbertotal = "0";
}

    $tracks = "Track: $tracknumber - $tracknumbertotal"."<br>";


if (!empty($Trackinfo['Recorded_Date'])) {
$trackrelease = "Release: ".$Trackinfo['Recorded_Date']."<br>";
}


$customfileinfo = "Length <span class='codesel' id='length'></span>\n$tracktitle$trackalbum$trackartist$trackrelease$tracks";
?>
