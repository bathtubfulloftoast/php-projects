<title><?php
$entry = $_GET['entry'];
$MURIKA = str_replace('.', '/', $entry);
$year = date("Y", strtotime($MURIKA));
$day = date("j", strtotime($MURIKA));
$month = date("n", strtotime($MURIKA));

$tmrw = date('n.j', strtotime('+1 day', strtotime($MURIKA)));
$tmrw2 = date('n.j', strtotime('+2 day', strtotime($MURIKA)));

$ystrd = date('n.j', strtotime('-1 day', strtotime($MURIKA)));
$ystrd2 = date('n.j', strtotime('-2 day', strtotime($MURIKA)));

$dottoslash = "$year/$month.$day";


echo date('l F jS Y', strtotime($MURIKA));


 




?>
</title>

<h1  style="text-align:left;user-select:none;">
<a title="back" class="back" href="<?php
echo "?year=$year";
?>
"><span class="material-symbols-outlined">arrow_back</span></a>

<a title="home" class="back" href="./"><span class="material-symbols-outlined">home</span></a>

<a title="go to the bottom of the page" class="back" href="#bottom"><span class="material-symbols-outlined">arrow_downward</span></a>




<a title="more" class="back" href="javascript:void(0);" onclick="myFunction()" style="display: inline-block;"><span class="material-symbols-outlined">
more_horiz
</span></a>

<div id="navbar" style="display: none; display: inline-block;">

<a title="open in folder" class="back" href="?folder&date=<?php echo $entry;?>" target="blank" ><span class="material-symbols-outlined">folder</span></a>


<?php
$todaylink = date('n.j.Y');
$today = date('Y/n.j');
$currententry = date('n.j.Y', strtotime($MURIKA));

if (file_exists('entries/'.$today)) {

 if ($currententry == $todaylink) {
#echo '<a title="this is the official entry of today '.$todaydate.'" style="color:lime"><span class="material-symbols-outlined">verified</span></a>';
 } else {
if ("$tmrw.$year" !== $todaylink){
echo '<a title="go to most recent entry" class="back" href="?entry='.$todaylink.'"><span class="material-symbols-outlined">today</span></a>';
}
}

 }
?>
<?php

if (file_exists("entries/$year/$ystrd")) {
echo "<a class='back' href='?entry=$ystrd.$year'><span class=\"material-symbols-outlined\">navigate_before</span>
</a>";
} elseif (file_exists("entries/$year/$ystrd2")) {
echo "<a class='back' href='?entry=$ystrd2.$year'><span class=\"material-symbols-outlined\">navigate_before</span>
</a>";
}
?>
<?php
if ("$tmrw.$year" !== date('n.').date('j')+1 .date(".Y")){

if ("$tmrw" !== "1.1"){
if (file_exists("entries/$year/$tmrw")) {
echo "<a class='back' href='?entry=$tmrw.$year'><span class=\"material-symbols-outlined\">navigate_next</span>
</a>";
} elseif (file_exists("entries/$year/$tmrw2")) {
echo "<a class='back' href='?entry=$tmrw2.$year'><span class=\"material-symbols-outlined\">navigate_next</span>
</a>";
}
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
/*


if($isMob){
echo '<div class="mobtext">';
}else{
echo '<div class="text">';
}*/
?>
<div class="text">
<a id="top"></a>
<p>
<?php

$entrydir = 'entries/' . $dottoslash . '/';

if (file_exists('entries/' . $dottoslash.'/entry.php')) {

if (file_exists('entries/' . $dottoslash.'/dontembed.txt')) {
    include("entries/" . $dottoslash . "/entry.php");

} else {


    ob_start();
    include("entries/" . $dottoslash . "/entry.php");
    $content = ob_get_contents();
    ob_clean();
    // Replace `<video` with `<video class="video-js"`
    // $content = str_replace('<video', '<video class="video-js" data-setup="{}"', $content);

    // Replace `src="` with `src="$entrydir/"` (optional)
    $content = str_replace('src="', 'src="'.$entrydir, $content);

    $content = str_replace('src="'.$entrydir.'http','src="http', $content);

    $content = str_replace('poster="', 'poster="'.$entrydir.'/', $content);

    $content = str_replace('poster="'.$entrydir.'http','poster="http', $content);

    // and for links.
    $content = str_replace('href="', 'href="?date='.$entry.'&file=', $content);

    $content = str_replace('href="?date='.$entry.'&file=http','href="http', $content);
    $content = str_replace('href="?date='.$entry.'&file=#','href="#', $content);



//$content = str_replace('<audio', '<audio class="video-js" id="vjs-audio" data-setup="{}"', $content);



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
<?php
$dayof = 1+date("z", strtotime($MURIKA));
$leapyear = 365+date("L", strtotime($MURIKA));

?>
</div>
<script>
document.addEventListener('click', function(event) {
  if (event.target.tagName.toLowerCase() === 'spoiler') {
    event.target.classList.toggle('spoiler-revealed');
    toggleAnchorClickable(event.target);
  } else if (event.target.tagName.toLowerCase() === 'img') {
    var spoiler = findParentSpoiler(event.target);
    if (spoiler) {
      spoiler.classList.toggle('spoiler-revealed');
      toggleAnchorClickable(spoiler);
    }
  }
});

function findParentSpoiler(element) {
  var parent = element.parentNode;
  while (parent) {
    if (parent.tagName.toLowerCase() === 'spoiler') {
      return parent;
    }
    parent = parent.parentNode;
  }
  return null;
}

function toggleAnchorClickable(spoiler) {
  var anchors = spoiler.getElementsByTagName('a');
  for (var i = 0; i < anchors.length; i++) {
    if (spoiler.classList.contains('spoiler-revealed')) {
      anchors[i].removeAttribute('data-clickable');
    } else {
      anchors[i].setAttribute('data-clickable', 'true');
    }
  }
}

document.addEventListener('click', function(event) {
  if (event.target.tagName.toLowerCase() === 'a') {
    var spoiler = findParentSpoiler(event.target);
    if (spoiler && !spoiler.classList.contains('spoiler-revealed')) {
      event.preventDefault();
    }
  }
});
</script>

