<title><?php
$year = $_GET['year'];
//this gets the text for the year tag (for example) ?year=2023 would output 2023
echo $year;

?></title>
<h1  style="text-align:left">

<a class="back" href="."><span class="material-symbols-outlined">arrow_back</span></a>


</h1>




<hr class="tophr">

<h2>
<?php
#$year = '2023';
$year = $_GET['year'];
$nuhuh = str_replace('..', 'null', $year);
$nuhuh = str_replace('.', 'null', $nuhuh);

// this gets the related info to lead to a 404

// this checks if the year exists
if (file_exists('entries/'.$nuhuh)) {

// this checks if the ?year tag is empty
if (empty($_GET['year'])) {header("HTTP/1.0 404 Not Found");}

// if all checks are passed it sets the dir tag properly
$dir    = 'entries/'.$year;


 } else {

// if the year doesnt exist it tells the server to give a 404 error
header("HTTP/1.0 404 Not Found");

}

$flies = array_values(array_diff(scandir($dir), array('..', '.')));

for ($i = 0; $i < count($flies); $i++) {
    sort($flies,  SORT_NATURAL);



echo '<div class="paddingdiv"><a class="daybooton" href="?entry='.$flies[$i].','.$year . '">' . $flies[$i] . '</a></div>';






}


?>
</h2>
