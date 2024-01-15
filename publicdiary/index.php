<?php
$test = 0;
//this sets the test tag to zero by default
?>
<head>
<!--Embed-->
    <meta content="My Diary <3" property="og:title" />

<?php if (isset($_GET['entry'])): $test = 1;?>
<?php $entry = $_GET['entry']; ?>

<meta http-equiv="Refresh" content="0; url='/diary/?entry=<?php echo $entry; ?>'" />


    <meta content="<?php
//establish needed dates
$dateonly = substr($entry, 0, strpos($entry, ","));
$yearonly = substr ($entry, strrpos( $entry, ',' ) + 1 );
$dottoslash = $yearonly.'-'.$dateonly;
$nien = str_replace('.', '-', $dottoslash);

$easter = date("n.j", easter_date());
$haloween = '10'.date(".t", strtotime($nien));
$newyear = '12'.date(".t", strtotime($nien));

// see if the entry even exists
if (file_exists($_SERVER['DOCUMENT_ROOT'].'/diary/entries/'.$yearonly.'/'.$dateonly)) {

// if it does yanderedev it up and check for any given date
if ($dateonly == '12.25') {
    $day = 'Christmas '.date('Y', strtotime($nien)).'!!';
} elseif ($dateonly == '12.24') {
    $day = 'Christmas Eve '.date('Y', strtotime($nien)).'!!';
} elseif ($dateonly == $easter) {
    $day = 'Entry For Easter '.date('Y', strtotime($nien)).'!!';
} elseif ($dateonly == $haloween) {
    $day = 'Entry For Haloween '.date('Y', strtotime($nien)).'!!';
} elseif ($dateonly == $newyear) {
    $day = 'Goodbye '.$yearonly.'!!!';
} elseif ($dateonly == '1.1') {
    $day = 'HAPPY NEW YEAR!!
    WELCOME '.$yearonly.'!!!';
} else {
    $day = 'Entry For '.date('l F jS Y', strtotime($nien));
}
} else {
    // pseudo 404 (since its an embed)
    $day = 'The Entry For '.date('n/j/Y', strtotime($nien)).' doesnt exist.';
}

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


