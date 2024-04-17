<?php
$size = filesize("$dir$file");

$md5 = md5_file("$dir$file");

if (!empty($customfileinfo)) {
// i fucking give up man
// future me better have a better way to do this shit
$dalfjaskjd = "$customfileinfo";
}

echo "<hr><code>$dalfjaskjd File Size: <span class='codesel' id='formattedbytes'></span><br>Name: $filnme <br>Extention: $filext <br>Path: $path <br>MD5: $md5</code>";

?>
<hr>
<!-- This script is specific to loaders/video.php
HOWEVER.
with how i have everything its going to have an aneurism if it isnt in this specific area
so (shruggie)
-->

<?php
// and php code since the same shit applies again UGHHHHH
if ($filetype == '2') {
echo "<script src='video.js'></script>";
} elseif ($filetype == '3') {
echo "<script src='audio.js'></script>";
}
?>




<script>
function formatBytes(bytes, decimals = 2) {
  if (!+bytes) return '0 Bytes';

  const k = 1024;
  const dm = decimals < 0 ? 0 : decimals;
  const sizes = ['Bytes', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB'];

  const i = Math.floor(Math.log(bytes) / Math.log(k));

  // Replace the following line with your desired code-determined string
  const codeDeterminedString = "This is the formatted string";

  return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`;
}

document.getElementById("formattedbytes").innerHTML += `${formatBytes(<?php echo $size; ?>, 2)}`;
</script>
