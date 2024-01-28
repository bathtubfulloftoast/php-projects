<!DOCTYPE html>
<title>Search</title>
<?php
$search = $_GET['search'];
if (!empty($search)) {
    // input is not empty so display the previous search
    $placeholder = "$search";
} else {
    // Input is empty, handle accordingly
    $placeholder = "schmoogle bearch";
}

?>
<body>
<h1  style="text-align:left">

<a class="back" href="./"><span class="material-symbols-outlined">arrow_back</span></a>

<!-- very basic post request doesnt really matter. -->
</h1>
<hr class="tophr">
<div class="center-screen">
<h1>Novas Entry Search</h1>
<!-- i made the search so theres my name!! -->
<p>Search for keywords in your diary!</p>
<form action="?searchfunc" method="post">
  <input type="text" name="searchTerm" placeholder="<?php echo $placeholder; ?>">
  <button type="submit">Search</button>
</form>
</div>
</body>

