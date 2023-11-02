<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="/misc/codelets/cursor.css">
<link rel="stylesheet" href="/misc/codelets/font.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

<head>

<style>
a {
    text-decoration: none;
}
a:link, a:visited{
    color: gray
}
a:hover {
    color: red;
}

</style>


<link rel="stylesheet" href="/misc/codelets/font.css">


    <style>
body {
  cursor: url('/misc/media/cursor.png') , url('/misc/media/cursor.cur') , auto;
}
</style>

</head>

 <body style="color:white;background-color:black;text-align:center;font-family:SetoFont">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1>
<?php

$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  $filename = pathinfo($target_file, PATHINFO_FILENAME);
  $extension = pathinfo($target_file, PATHINFO_EXTENSION);
  $counter = 1;

  // Generate a new unique filename
  while (file_exists($target_dir . $filename . '_' . $counter . '.' . $extension)) {
    $counter++;
  }

  $target_file = $target_dir . $filename . '_' . $counter . '.' . $extension;

  $uploadOk = 1;
}
// what the fuck chatgpt what the actual fuck

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo '<span style="color:green">The upload succeeded!</span> <title>Upload Succeeded!</title>'."<meta http-equiv='refresh' content='0; URL=".'redirect.php?file='.$target_file."'>";

  } else {
    echo '<span style="color:red">File Failed To Upload</span> <title>The upload failed.</title>'."<meta http-equiv='refresh' content='20; URL=.'>";
  }
}

?>
</h1>

<h2><a href=".">Back</a></h2>
</html>
<?php

#base code

/*

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
*/


?>
