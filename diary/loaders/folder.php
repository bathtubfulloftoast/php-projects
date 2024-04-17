<?php
if(is_dir("$dir$file")) {
header("Location: ?folder=$directory/$file&date=$date");
} else {
    include('loaders/unknown.php');
}
?>
