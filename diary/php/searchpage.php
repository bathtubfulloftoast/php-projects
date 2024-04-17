<!DOCTYPE html>
<title>Search</title>
<?php
$search = $_GET['search'];
if (!empty($search)) {
$searchdis = str_replace('<', '&lt;', $search);
$searchdis = str_replace('>', '&gt;', $searchdis);
$searchdis = str_replace('"', '&quot;', $searchdis);
    // Input is not empty, proceed with actions
    $placeholder = "$searchdis";
} else {
    // Input is empty, handle accordingly
    $placeholder = "schmoogle bearch";
}

?>
<body>
<h1  style="text-align:left">

<a class="back" href="./"><span class="material-symbols-outlined">arrow_back</span></a>


</h1>
<hr class="tophr">
<div class="center-screen">
<h1>Alices Entry Search</h1>
<p>creeping made easy!</p>
<form action="?searchfunc" method="post">
  <input type="text" name="searchTerm" placeholder="<?php echo $placeholder; ?>">
  <button type="submit">Search</button>
</form>
</div>
</body>

