<?php 
$searchTerm = $_POST['searchTerm'];


$amireal= $_POST['searchTerm'];
if (!empty($amireal)) {
// search is not empty, go on like normal.
} else {
// input is empty redirect to search page.
 header("Location: /diary/?search");
}

?>
<h1  style="text-align:left">

<a class="back" href="?search=<?php echo $searchTerm; ?>"><span class="material-symbols-outlined">arrow_back</span></a>


</h1>
<hr class="tophr">
<?php
if (isset($_POST['searchTerm'])) {

  echo "<title>search for &quot$searchTerm&quot</title>";
  $directory = 'entries/';

  // Use exec() to execute the grep command with escaping for security
  $output = array();
  exec('grep --include=entry.php -Rnli "'.$directory.'" -e "'.$searchTerm.'"|sort -nr', $output);
// grep --include=entry.php -Rnli "$directory" -e "$searchTerm"|sort -nr
// this is our search command without php specifics
// grep is the program we are using
// --include=entry.php makes sure to only search through valid entries
// -Rnli is our search options
//
// -R, recursive following symlinks
// -n, print line number with output lines (it doesnt do that feel free to remove im too lazy)
// -l, only display file names without printing contents
// -i, ignores case sensitivity
//
// "$directory" is the folder were searching through
// so the... directory...
//
// -e "$searchterm" is what were searching for
//
// |sort -nr
// the line is a pipe telling linux to route the output of grep to the sort command
// -n makes it numeric (only via year since i could not get it to work with decimals for the life of me)
// -r reverses it to show newest first
//
// since this is linux it gets alot more explanation than other stuff since its not just php
// doubted youre on a server with php support so youre probably familiar with linux already.
  if (!empty($output)) {
    echo "<h2>Results For &quot;$searchTerm&quot;:</h2>";
    echo "<h2>";
    foreach ($output as $line) {
      $parts = explode(':', $line);
      $filename = $parts[0];
      $link = str_replace('entries/','', $filename);
      $link = str_replace('/entry.php','', $link);
    $year = substr($link, 0, strpos($link, "/"));
    $date = substr ($link, strrpos( $link, '/' ) + 1 );
        echo "<a class='daybooton' href='/diary/?entry=$date,$year' target='blank'>$date.$year</a><br><br>";
    }
  } else {
    echo "No results found for &quot$searchTerm&quot.";
  }
}
?>
</h2>
