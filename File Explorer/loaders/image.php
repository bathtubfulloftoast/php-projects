<!--Embed-->
<meta content="<?php echo "$file"; ?>" property="og:title" />
<meta content="<?php echo "/test/$dir$file"; ?>" property="og:image" />
<meta property="og:type" content="image">
<meta name="twitter:card" content="summary_large_image">
<meta content="#6b0059" data-react-helmet="true" name="theme-color" />

<h1><?php echo "$file"; ?></h1>
<?php
echo '<img src="'.$dir.$file.'">';
?>

