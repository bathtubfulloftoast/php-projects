<?php
$folder = $_GET['folder'];
$date = $_GET['date'];

$MURIKA = str_replace('.', '/', $date);
$year = date("Y", strtotime($MURIKA));
$day = date("j", strtotime($MURIKA));
$month = date("n", strtotime($MURIKA));
$dateonly = "$month.$day";
$yearonly = "$year";

$path = "entries/$yearonly/$dateonly$folder/";

$dir = "entries/$yearonly/$dateonly/$folder";
if (file_exists($dir)) {
} else {
header("HTTP/1.0 404 Not Found");
}
$parentDirectory = dirname($folder);  // Get the parent directory
if ($parentDirectory == '.') {
    $prevdir = "";
} elseif ($parentDirectory == '/') {
        $prevdir = "";
} else {
    $prevdir = $parentDirectory;
}

?>
<?php
if (!empty($date)) {
} else {
header("HTTP/1.0 404 Not Found");
}
?>
<title><?php echo basename($path); ?></title>
<h1  style="text-align:left">
<?php
if (!empty($folder)) {
echo '<a class="back" href="?folder='.$prevdir.'&date='.$date.'"><span class="material-symbols-outlined">arrow_back</span></a>';
} else {
echo '<a class="back" href="?entry='.$date.'"><span class="material-symbols-outlined">arrow_back</span></a>';
}
?>

<?php include('loaders/folderfooter.php'); ?>
</h1>
<hr class="tophr">
<?php

$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));


if($isMob){

}else{

echo "<br>\n<div class='files'>";

}
?>

<h2>
<?php


$flies = preg_grep('/^([^.])/', scandir($dir));


for ($i = 0; $i < count($flies); $i++) {
    sort($flies, SORT_NATURAL | SORT_FLAG_CASE);
$filext = strtolower(pathinfo($flies[$i], PATHINFO_EXTENSION));
$filnme = strtolower(pathinfo($flies[$i],  PATHINFO_FILENAME));
include("loaders/filetypes.php");
if ($filetype == '0') {
$filevis = "description";
} elseif ($filetype == '1') {
$filevis = "image";
} elseif ($filetype == '2') {
$filevis = "movie";
} elseif ($filetype == '3') {
$filevis = "volume_up";
} elseif ($filetype == '4') {
$filevis = "description";
} elseif ($filetype == '5') {
$filevis = "deployed_code";
}

elseif ($filetype == 'null') {
if (!empty($filext)) {
$filevis = "question_mark";
} else {
$filevis = "folder";
}
}


if (!empty($folder)) {
$shit = '&nbsp;<span class="material-symbols-outlined">'.$filevis.'</span>: <a href="?file='.$flies[$i].'&date='.$date.'&directory='.$folder.'">'."$flies[$i]</a><br>";
} else {
$shit = '&nbsp;<span class="material-symbols-outlined">'.$filevis.'</span>: <a href="?file='.$flies[$i].'&date='.$date.'">'."$flies[$i]</a><br>";

}
   // $shit = '<div class="paddingdiv"><a class="daybooton" href="'.$dir . $flies[$i] . '">' . $flies[$i] . '</a></div>';


echo $shit;


}
?>
</h2>
</div>
<script>
  function toClipboard(text) {
    if ("clipboard" in navigator && typeof navigator.clipboard.writeText === "function") {
      // Chrome
      return navigator.clipboard.writeText(text)
        .then(() => true)
        .catch(() => false);
    } else {
      // Firefox
      const input = document.createElement("input");
      input.value = text;
      input.style.position = "fixed";
      input.style.top = "-2000px";
      document.body.appendChild(input);
      input.select();
      try {
        return Promise.resolve(document.execCommand("copy"))
          .then(res => {
            document.body.removeChild(input);
            return res;
          });
      } catch (err) {
        return Promise.resolve(false);
      }
    }
  }

  document.querySelector("#copyFileLink").addEventListener("click", function (e) {
    e.preventDefault();
    toClipboard("<?php
/*$uri = $_SERVER['REQUEST_URI'];
echo $uri; // Outputs: URI*/

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$url = $protocol . $_SERVER['HTTP_HOST'] . "/publicdiary/folder/?" .  $_SERVER['QUERY_STRING'];
echo $url; // Outputs: Full URL
?>")
      .then(res => console.log("copied", res));
  });
</script>
