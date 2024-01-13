<title><?php
$entry = $_GET['entry'];

$dottoslash = substr ($entry, strrpos( $entry, ',' ) + 1 ).'-'.substr($entry, 0, strpos($entry, ","));
$nien = str_replace('.', '-', $dottoslash);


$day = date('l F jS Y', strtotime($nien));


echo $day;




?>
</title>


<h1  style="text-align:left">
<a title="back" class="back" href="<?php
$entry = $_GET['entry'];
echo '?year='.substr ($entry, strrpos( $entry, ',' ) + 1 );

?>
"><span class="material-symbols-outlined">arrow_back</span></a>

<a title="home" class="back" href="./"><span class="material-symbols-outlined">home</span></a>

<a title="go to the bottom of the page" class="back" href="#bottom"><span class="material-symbols-outlined">arrow_downward</span></a>

<a title="more" class="back" href="javascript:void(0);" onclick="myFunction()" style="display: inline-block;"><span class="material-symbols-outlined">
more_horiz
</span></a>

<div id="navbar" style="display: none; display: inline-block;">

<a title="open in folder" class="back" href="<?php
$entry = $_GET['entry'];
$dottoslash = substr ($entry, strrpos( $entry, ',' ) + 1 ).'/'.substr($entry, 0, strpos($entry, ","));
    $entrydir = 'entries/'.$dottoslash.'/';
 if (file_exists('entries/'.$dottoslash)) {
echo "entries/".$dottoslash;
// this gets the file and outputs it alongside any php code thats added
 }
?>" target="blank" ><span class="material-symbols-outlined">folder</span></a>

<?php
date_default_timezone_set('America/Denver');
$todaylink = date('n.j,Y');
$today = date('Y/n.j');
# $todaydate = date('n/j/Y');
$entry = $_GET['entry'];





 if (file_exists('entries/'.$today)) {

 if ($entry == $todaylink) {
#echo '<a title="this is the official entry of today '.$todaydate.'" style="color:lime"><span class="material-symbols-outlined">verified</span></a>';
 } else {
echo '<a title="go to most recent entry" class="back" href="?entry='.$todaylink.'"><span class="material-symbols-outlined">today</span></a>';
}


 }
?>

</div>

</h1>
<script>
function myFunction() {
  var x = document.getElementById("navbar");
  if (x.style.display === "none" || x.style.display === "") {
    x.style.display = "inline-block";
  } else {
    x.style.display = "none";
  }
}
window.onload = function() {
  var x = document.getElementById("navbar");
  x.style.display = "none"; // Hide by default on page load
}
</script>



<hr class="tophr">


<?php

$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));


if($isMob){



echo '<div class="mobtext">';

}else{

echo '<div class="text">';

}
?>

<a id="top"></a>
<p>
<?php

$entry = $_GET['entry'];

$dottoslash = substr($entry, strrpos($entry, ',') + 1) . '/' . substr($entry, 0, strpos($entry, ','));

$entrydir = 'entries/' . $dottoslash . '/';

if (file_exists('entries/' . $dottoslash.'/entry.php')) {

if (file_exists('entries/' . $dottoslash.'/dontembed.txt')) {
    include("entries/" . $dottoslash . "/entry.php");

} else {


    ob_start();
    include("entries/" . $dottoslash . "/entry.php");
    $content = ob_get_contents();
    ob_clean();

    // replace links to local media and make them work
    $content = str_replace('src="', 'src="'.$entrydir, $content);

    // if it is offsite undo the previous change
    $content = str_replace('src="'.$entrydir.'http','src="http', $content);

    // do the same with posters
    $content = str_replace('poster="', 'poster="'.$entrydir.'/', $content);

    $content = str_replace('poster="'.$entrydir.'http','poster="http', $content);



    echo $content;
}
} else {
    header("HTTP/1.0 404 Not Found");
}
?>


<a id="bottom"></a>
</p>
<hr>
<h1><a title="go to the top of the page" class="back" href="#top"><span class="material-symbols-outlined">arrow_upward</span></a></h1>

</div>

