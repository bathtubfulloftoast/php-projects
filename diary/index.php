<?php
$test = 0;
//this sets the test tag to zero by default
?>

<head>
    
<link rel="stylesheet" href="style.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
    

<!-- Begin Google Shit -->

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<style>
.material-symbols-outlined {
    font-size:28;
  font-variation-settings:
  'FILL' 0,
  'wght' 600,
  'GRAD' 0,
  'opsz' 24
}
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Color+Emoji&display=swap" rel="stylesheet">
<!-- End Google Shit -->

</head>

<?php if (isset($_GET['entry'])): $test = 1;
// this checks if ?tag is put at the end of the link and sets test to one so the default page doesnt show when another page is supposed to
?>

<title><?php
// this is the tile (if you couldnt tell)
$entry = $_GET['entry'];
// first the entry tag is established
$dottoslash = substr ($entry, strrpos( $entry, ',' ) + 1 ).'-'.substr($entry, 0, strpos($entry, ","));
// next any commas (dont ask why its a dot) are replaced with dashes and shoved to wherever i put them
$nien = str_replace('.', '-', $dottoslash);
// next the periods are replaced

$day = date('l F jS Y', strtotime($nien));
// next the correctly formatted date is put in the nien tag (i tend to put no as a tag but in testing i was already using it)
// and then its formatted differently

echo $day;
// and obviously outputting it



?>
</title>

<h1  style="text-align:left">
<a title="back" class="back" href="<?php
$entry = $_GET['entry'];
echo '?year='.substr ($entry, strrpos( $entry, ',' ) + 1 );
// next it removes all before that helpful comma and just gives you the year (i hate javascript)
?>
"><span class="material-symbols-outlined">arrow_back</span></a> 

<a title="home" class="back" href="./"><span class="material-symbols-outlined">home</span></a>

<a title="go to the bottom of the page" class="back" href="#bottom"><span class="material-symbols-outlined">arrow_downward</span></a>

<a title="more" class="back" href="javascript:void(0);" onclick="myFunction()" style="display: inline-block;"><span class="material-symbols-outlined">
more_horiz
</span></a>

<div id="navbar" style="display: none; display: inline-block;">

<a title="share" class="back" id="copyLink" href="#"><span class="material-symbols-outlined">share</span></a>

<a title="open in folder" class="back" href="<?php
$entry = $_GET['entry'];
$dottoslash = substr ($entry, strrpos( $entry, ',' ) + 1 ).'/'.substr($entry, 0, strpos($entry, ","));
    $entrydir = 'entries/'.$dottoslash.'/';
 if (file_exists('entries/'.$dottoslash)) {
echo "entries/".$dottoslash;
// this grabs the link to the folder with the current entry and links you to it
 }
?>" target="blank" ><span class="material-symbols-outlined">folder</span></a>

<?php
date_default_timezone_set('America/Denver');
$todaylink = date('n.j,Y');
$today = date('Y/n.j');
$entry = $_GET['entry'];

// this will grab the current date and check if there are any entries for it to display a link



 if (file_exists('entries/'.$today)) {
// this checks if the entry exists
 if ($entry == $todaylink) {
     // this checks if you are looking at it
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
// i hate javascript i never use java HISSSSSSS
</script>



<hr class="tophr">

<?php

$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
// this checks the user agent to see if it should change the div to what i have for mobile
// (note the movile div is intended to wrap around the screen fully horizontally but i havent gotten it to work)

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

$dottoslash = substr ($entry, strrpos( $entry, ',' ) + 1 ).'/'.substr($entry, 0, strpos($entry, ","));


    //this makes the comma a slash so it can read as i directory and the link can be nice

    $entrydir = 'entries/'.$dottoslash.'/';
 if (file_exists('entries/'.$dottoslash)) {

include ("entries/".$dottoslash."/entry.php");
// this gets the file and outputs it alongside any php code thats added
 } else {
// this is so it can properly lead to a 404 instead of showing a blank nothing page
// mostly used to prevent 500 errors upon any back button presses
header("HTTP/1.0 404 Not Found");

}




?>
<a id="bottom"></a>
</p>
<hr>
<h1><a title="go to the top of the page" class="back" href="#top"><span class="material-symbols-outlined">arrow_upward</span></a></h1>

</div>
<?php endif ?>


<?php if (isset($_GET['year'])): $test = 1;?>
<title><?php
$year = $_GET['year'];
//this gets the text for the year tag (for example) ?year=2023 would output 2023
echo $year;

?></title>
<h1  style="text-align:left">
    
<a class="back" href="."><span class="material-symbols-outlined">arrow_back</span></a>

<!-- this would be a redirect to the current day as of the currently selected year <?php
/*
$year = $_GET['year'];
$waybackwhen = date('n.j,').$year;
$noyear = 'entries/'.$year.'/'.date('n.j').'/entry.php';

$entry = $_GET['entry'];



 if (file_exists($noyear)) {

echo '<a class="back" href="?entry='.$waybackwhen.'"><span class="material-symbols-outlined">today</span></a>';

}*/
?> this code is not intended to be implemented in its current state. when implemented it overcrowds the year section-->

<a class="back" id="copyLink" href="#"><span class="material-symbols-outlined">share</span></a>



</h1>




<hr class="tophr">

<h2>
<?php
$year = $_GET['year'];

// this is a check for if the year even exists.
// if it does not itl lead to a 500 error usually.
 if (file_exists('entries/'.$year)) {
     
$dir    = 'entries/'.$year;



 } else {

header("HTTP/1.0 404 Not Found");

}


// this is file shit
// i cant explain a thing here it does what it does
// i know how to utilize it dont get me wrong but its just magic to me

$flies = array_values(array_diff(scandir($dir), array('..', '.')));

for ($i = 0; $i < count($flies); $i++) {
    sort($flies,  SORT_NATURAL);

    $shit = '<div class="paddingdiv"><a class="daybooton" href="?entry='.$flies[$i].','.$year . '">' . $flies[$i] . '</a></div>';

echo $shit;


// hehe shit tag




}


?>
</h2>
<?php endif ?>

<?php if ($test == 0):
// finally this is the default page so it checks if $test is 0 and it is!
?>
<title>diary</title>


<h1>
<?php
// the same thing as way above
// it checks if theres an entry and puts a link to this
// note if you wish to make this a blog of any sort change it to be more user friendly!
// as it stands this intended to be personal and does not stand to be user friendly.
date_default_timezone_set('America/Denver');
$todaylink = date('n.j,Y');
$today = date('n.j.y');
$todayfile = date('Y/n.j');

 if (file_exists('entries/'.$todayfile.'/entry.php')) {

echo '<a class="back" href="?entry=' . $todaylink . '">&#127800 My Diary &#127800</a>';

 } else {
     echo '<span style="color:white">&#127800 My Diary &#127800</span>';
 }

 ?>
</h1>
 
 
<hr class="tophr">
<h2>
<?php
$dir    = 'entries/';

$flies = array_values(array_diff(scandir($dir), array('..', '.', 'index.php')));

for ($i = 0; $i < count($flies); $i++) {
    $nophp = str_replace('.php', '', $flies[$i]);
    sort($flies,  SORT_NATURAL);

    $shit = '<a class="daybooton" href="?year=' . $flies[$i] . '">' . $nophp . '</a><br><br>';



//file shiiiit
echo $shit;


}



?>
</h2>
<?php endif ?>

<script>
// copy link code (the worst of the spagetti for i shoved php code in javascript *shiver* )
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

  document.querySelector("#copyLink").addEventListener("click", function (e) {
    e.preventDefault();
    toClipboard("<?php
    
   
      $entry = $_GET['entry'];
      $year = $_GET['year'];

      $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

      $url = $protocol . $_SERVER['HTTP_HOST'];

   if (isset($_GET['year'])) {echo $url.'/publicdiary/?year='.$year;}
   if (isset($_GET['entry'])) {echo $url.'/publicdiary/?entry='.$entry;}

    ?>")
      .then(res => console.log("copied", res));
  });
</script>
