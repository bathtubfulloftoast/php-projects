<head>
<title>file viewer</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="/misc/codelets/cursor.css">
<link rel="stylesheet" href="/misc/codelets/font.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>


<h1 style="text-align:left"><a class="back" href="."><-- Back</a></h1>
<hr>
<div class="centered">



<?php if (isset($_GET['video'])): ?>

<!--Embed-->
    <meta content="<?php $file = $_GET['video']; echo $file; ?>" property="og:title" />
    <meta content="Video Uploaded On NovasSite" property="og:description" />
    <meta content="#6b0059" data-react-helmet="true" name="theme-color" />

<video controls>
 <source src="files/<?php

$file = $_GET['video'];

echo $file;
?>">
</video>

<p><a class="download" href="files/<?php


$file = $_GET['video'];

    $nospace = str_replace(' ', '%20', $file);


echo $nospace;
?>" download="<?php

$file = $_GET['video'];

echo $file;
?>" >download</a></p>

<?php endif ?>


<?php if (isset($_GET['photo'])): ?>

<!--Embed-->
    <meta name="twitter:card" content="summary_large_image">
<meta content="/misc/File%20Uploader/files/<?php


$file = $_GET['photo'];

    $nospace = str_replace(' ', '%20', $file);


echo $nospace;
?>" property="og:image" />

<img src="files/<?php

$file = $_GET['photo'];

echo $file;
?>">


<p><a class="download" href="files/<?php


$file = $_GET['photo'];

    $nospace = str_replace(' ', '%20', $file);


echo $nospace;
?>" download="<?php

$file = $_GET['photo'];

echo $file;
?>" >download</a>


</p>

<?php endif ?>


<?php if (isset($_GET['audio'])): ?>

<!--Embed-->
    <meta content="<?php $file = $_GET['audio']; echo $file; ?>" property="og:title" />
    <meta content="Audio Uploaded On NovasSite" property="og:description" />
    <meta content="#6b0059" data-react-helmet="true" name="theme-color" />

<audio controls>
 <source src="files/<?php

$file = $_GET['audio'];

echo $file;
?>">

</audio>
<p><a class="download" href="files/<?php


$file = $_GET['audio'];

    $nospace = str_replace(' ', '%20', $file);


echo $nospace;
?>" download="<?php

$file = $_GET['audio'];

echo $file;
?>" >download</a></p>

<?php endif ?>


<?php if (isset($_GET['text'])): ?>

    <meta content="<?php $file = $_GET['text']; echo $file; ?>" property="og:title" />
    <meta content="Text Uploaded On NovasSite" property="og:description" />
    <meta content="#6b0059" data-react-helmet="true" name="theme-color" />

<p class="text">

<?php

$file = 'files/'.$_GET['text'];

$no = str_replace('../', '', $file);

echo file_get_contents($no);
?>
</p>

<p><a class="download" href="files/<?php


$file = $_GET['text'];

    $nospace = str_replace(' ', '%20', $file);


echo $nospace;
?>" download="<?php

$file = $_GET['text'];

echo $file;
?>" >download</a></p>

<?php endif ?>




<?php if (isset($_GET['unknown'])): ?>

<!--Embed-->
    <meta content="<?php $file = $_GET['unknown']; echo $file; ?>" property="og:title" />
    <meta content="File Uploaded On NovasSite" property="og:description" />
    <meta content="#6b0059" data-react-helmet="true" name="theme-color" />

<h1>this filetype cannot be seen in your browser.
<br>
click <a class="download" href="files/<?php

$file = $_GET['unknown'];

echo $file;
?>" download="<?php

$file = $_GET['unknown'];

echo $file;
?>">this button</a> to download it.<br>if im wrong and it can, click <a class="download" href="files/<?php

$file = $_GET['unknown'];

echo $file;
?>" >this button</a> to view it anyways.</h1>

<?php endif ?>

<?php if (isset($_GET['danger'])): ?>

<!--Embed-->
    <meta content="<?php $file = $_GET['danger']; echo $file; ?>" property="og:title" />
    <meta content="File Uploaded On NovasSite" property="og:description" />
    <meta content="#6b0059" data-react-helmet="true" name="theme-color" />

<h1>this file could be dangerous.<br>dont download unless youre sure that it is safe.<br>if you know its safe click <a class="download" href="files/<?php


$file = $_GET['danger'];

    $nospace = str_replace(' ', '%20', $file);


echo $nospace;
?>" download="<?php

$file = $_GET['danger'];

echo $file;
?>" >this button</a> to download.<br>though dont worry if youre downloading through here its probably safe.</h1>


<?php endif ?>




    <button class="copylink" >Copy Link</button>
    <script>
    function toClipoard(text) {
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
    document.querySelector("button").addEventListener("click", _ => {
      toClipoard("<?php

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
echo $url; // Outputs: Full URL

?>")
        .then(res => console.log("copied", res));
    });
    </script>

</div>
<br>
<br>
<br>
