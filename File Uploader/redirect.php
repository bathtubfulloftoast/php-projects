 <?php

 $file = $_GET['file'];

 if(preg_match("/(.wav|.mp3)/i", $file)){
$filetype= 'audio';

} else {

    $filetype= 'unknown';

}

if(preg_match("/(.exe|.zip|.sh|.tar|.tar.gz|.7z|.rar|.jar|.apk)/i", $file)){
$filetype= 'danger';

}


if(preg_match("/(.mp4|.mov|.avi|.webm)/i", $file)){
$filetype= 'video';

}

if(preg_match("/(.png|.jpg|.jpeg|.gif|.webp|.svg)/i", $file)){
$filetype= 'photo';

}

if(preg_match("/(.txt)/i", $file)){
$filetype= 'text';

}

    $noslash = str_replace('files/', '', $file);


header('Location:'.'view.php?'.$filetype.'='.$noslash);

 ?>
