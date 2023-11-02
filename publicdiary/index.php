<?php
$test = 0;
// you will want the comments of the regular diary to mostly understand this
// for id be repeating myself
?>
<!--Embed-->
    <meta content="My Diary <3" property="og:title" />

<?php if (isset($_GET['entry'])): $test = 1;?>
<?php $entry = $_GET['entry']; ?>

<meta http-equiv="Refresh" content="0; url='/diary/?entry=<?php echo $entry; ?>'" />


    <meta content="Entry For <?php
$dottoslash = substr ($entry, strrpos( $entry, ',' ) + 1 ).'-'.substr($entry, 0, strpos($entry, ","));
$nien = str_replace('.', '-', $dottoslash);


$day = date('l F jS Y', strtotime($nien));


echo $day;
?>" property="og:description" />

<?php endif ?>


<?php if (isset($_GET['year'])): $test = 1;?>
<?php $year = $_GET['year']; ?>

<meta http-equiv="Refresh" content="0; url='/diary/?year=<?php echo $year; ?>'" />

    <meta content="entries for <?php


echo $year;
?>" property="og:description" />

<?php endif ?>

<?php if ($test == 0): ?>
<meta http-equiv="Refresh" content="0; url='/diary'" />
    <meta content="its my diary! (BOYS KEEP OUT!!)" property="og:description" />
<?php endif ?>
<meta content="/publicdiary/faun.png" property="og:image" />
    <meta content="#1b141f" data-react-helmet="true" name="theme-color" />
