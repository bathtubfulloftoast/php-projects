<head>

<!--Embed-->
    <meta content="File Uploader" property="og:title" />
    <meta content="File Uploader For NovasSite" property="og:description" />
<meta name="twitter:card" content="summary_large_image">
<meta content="/misc/media/embeds/main.png" property="og:image" />
    <meta content="#6b0059" data-react-helmet="true" name="theme-color" />

 <title>Uploader</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="/misc/codelets/cursor.css">
<link rel="stylesheet" href="/misc/codelets/font.css">

<meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<h1 style="text-align:left"><a class="back" href="../"><-- Back</a></h1>
<hr>
 <h1>basic file uploader!</h1>
 <p>Rules: no illegal shit piracy etc max file size is 1GB<br>also if you upload to this you agree to me deleting whatever i dont like or takes up too much space<br>
 this is fully anonymous and anyone can upload anything.
 <br>
 if your file is renamed it wont tell you. <i>im laaazzzy</i>
     <br>
     wondering where your files are? try looking at the <a class="back" href="archives/">archives.</a>
     </p>

 <br>

<form action="upload.php" method="post" enctype="multipart/form-data" >
<input type="file" name="fileToUpload" id="submit" />
<input type="submit" value="Upload" id="submit"/>
</form>





<br><br>
<hr>
<h2>all uploaded files</h2>

<br><br>
<p>
<?php

$dir    = 'files/';

$flies = array_values(array_diff(scandir($dir), array('..', '.', 'index.php', '.htaccess', 'upload.php','view.php')));



for ($i = 0; $i < count($flies); $i++) {

if(preg_match("/(.wav|.mp3)/i", $flies[$i])){
$filetype= 'audio';

} else {

    $filetype= 'unknown';

}

if(preg_match("/(.exe|.zip|.sh|.tar|.tar.gz|.7z|.rar|.jar|.apk)/i", $flies[$i])){
$filetype= 'danger';

}


if(preg_match("/(.mp4|.mov|.avi|.webm)/i", $flies[$i])){
$filetype= 'video';

}

if(preg_match("/(.png|.jpg|.jpeg|.gif|.webp|.svg)/i", $flies[$i])){
$filetype= 'photo';

}

if(preg_match("/(.txt)/i", $flies[$i])){
$filetype= 'text';

}





//commented because i actually decided to put svgs as images whoop
//nevermind i give up i guess ill need to do it here
//NEVER NEVER MIND IT WAS TOO LOW DOWN TAKING UP EVERYTHING SIMILAR
//FUCK DUDE




    $shit =  /*$filetype.*/' <a href="view.php?'.$filetype.'=' . $flies[$i] . '">' . $flies[$i]. '</a><br><br>';


echo $shit;

}



?>
</p>



