<?php 
$searchTerm = $_POST['searchTerm'];

$searchTermDisp = str_replace('<', '&lt;', $searchTerm);
$searchTermDisp = str_replace('>', '&gt;', $searchTermDisp);
$searchTermDisp = str_replace('"', '&quot;', $searchTermDisp);

$amireal= $_POST['searchTerm'];
if (!empty($amireal)) {
// search is not empty, go on like normal.
} else {
// input is empty redirect to search page.
 header("Location: /diary/?search");
}

?>
<h1  style="text-align:left">

<a class="back" href="?search=<?php echo $searchTermDisp; ?>"><span class="material-symbols-outlined">arrow_back</span></a>


</h1>
<hr class="tophr">
<?php
if (isset($_POST['searchTerm'])) {
    // originally what bard reccomended i use to clean up the output
    // however it fucking sucked since grep uses double quotes and not signle quotes
    // also i edited basically every line of code bard gave me i juse used it to help me start it off

  echo "<title>search for &quot$searchTermDisp&quot</title>";
  $directory = 'entries/';

  // Use exec() to execute the grep command with escaping for security
  $output = array();
  exec('grep --include=entry.php -Rnli "'.$directory.'" -e "'.$searchTerm.'"|sort -nr', $output);
  if (!empty($output)) {
    echo "<h2>Results For &quot;$searchTermDisp&quot;:</h2>";
    echo "<h2>";
    foreach ($output as $line) {
      $parts = explode(':', $line);
      $filename = $parts[0];
      //$lineNumber = $parts[1];
      $link = str_replace('entries/','', $filename);
      $link = str_replace('/entry.php','', $link);
    $year = substr($link, 0, strpos($link, "/"));
    $date = substr ($link, strrpos( $link, '/' ) + 1 );
        echo "<a class='daybooton' href='/diary/?entry=$date.$year' target='blank'>$date.$year</a><br><br>";
    }
  } else {
    echo "No results found for &quot$searchTermDisp&quot.";
  }
}
?>
</h2>
