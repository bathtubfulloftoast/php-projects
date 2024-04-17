<h1><?php echo "$file"; ?></h1>
<h2>cant display this file</h2>
<a href="<?php echo "loaders/download.php?file=$dir$file"; ?>">Download</a></h2>
<!--
note to self
do NOT make another thing for files YOU know
this is for files the browser cant embed
fuckoff
-->
<?php 
// this is only meant for any cases a folder is registered as unknown
// do NOT. use this as the default folder redirect
// it is slower and smelly :(
// (like noticably slower)
// SHSHSHHS
// until i find out how to properly detect folders with my current system this is what you get
// sooo ffuuuck you :3
 if(is_dir("$dir$file")) {
 header("Location: ?folder=$directory/$file&date=$date");
 }
 ?>