<title>diary</title>

<h1>
<?php
date_default_timezone_set('America/Denver');
$todaylink = date('n.j,Y');
$today = date('n.j.y');
$todayfile = date('Y/n.j');

 if (file_exists('entries/'.$todayfile.'/entry.php')) {

echo '<a class="back" href="?entry=' . $todaylink . '">Your Diary</a>';

 } else {
     echo '<span style="color:white">Your Diary</span>';
 }

 ?>
 <a class="back" href="?search"><span class="material-symbols-outlined">search</span></a>


</h1>
<hr class="tophr">
<h2>
<?php
$dir    = 'entries/';

$flies = array_values(array_diff(scandir($dir), array('..', '.', 'index.php', '.htaccess')));

for ($i = 0; $i < count($flies); $i++) {
#    $nophp = str_replace('.php', '', $flies[$i]);
    rsort($flies,  SORT_NATURAL);

    $shit = '<a class="daybooton" href="?year=' . $flies[$i] . '">' . $flies[$i] . '</a><br><br>';



//file shiiiit
echo $shit;


}



?>

</h2>
