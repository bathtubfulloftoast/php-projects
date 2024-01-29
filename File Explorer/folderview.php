<?php
$folderraw = $_GET['folder'];
$nuhuh = str_replace('..', 'null', $folderraw);
$nuhuh = str_replace('./', 'null', $nuhuh);
$folder = $nuhuh;
$dir = "media/$folder";


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
<title><?php if (!empty($folder)) {
echo "$folderraw";
} else {
echo "Folder";
}
?></title>
<h1  style="text-align:left">
<?php
if (!empty($folder)) {
echo '<a class="back" href="?folder='.$prevdir.'"><span class="material-symbols-outlined">arrow_back</span></a>';
} else {
echo '<a class="back" href="../"><span class="material-symbols-outlined">arrow_back</span></a>';
}
?>
 <a class="back" id="copyFileLink" href="#"><span class="material-symbols-outlined">share</span></a>
</h1>
<hr class="tophr">
<h2>
<?php


$flies = preg_grep('/^([^.])/', scandir($dir));


for ($i = 0; $i < count($flies); $i++) {
    sort($flies, SORT_NATURAL | SORT_FLAG_CASE);
if (!empty($folder)) {
$shit = '<a href="?file='.$flies[$i].'&directory='.$folder.'">'."$flies[$i]</a><br>";
} else {
$shit = '<a href="?file='.$flies[$i].'">'."$flies[$i]</a><br>";

}
   // $shit = '<div class="paddingdiv"><a class="daybooton" href="'.$dir . $flies[$i] . '">' . $flies[$i] . '</a></div>';


echo $shit;


}
?>
</h2>
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

$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
echo $url; // Outputs: Full URL

/*$query = $_SERVER['QUERY_STRING'];
echo $query; // Outputs: Query String*/
?>")
      .then(res => console.log("copied", res));
  });
</script>
