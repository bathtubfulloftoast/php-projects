<h1><?php echo "$file"; ?></h1>
<iframe src="<?php echo "$dir$file"; ?>" class="pdf" frameBorder="0"></iframe>

<?php
$nobreak = str_replace('(', '\(', $path);
$nobreak = str_replace(')', '\)', $nobreak);
$nobreak = str_replace(' ', '\ ', $nobreak);
$pdfpages = exec("qpdf --show-npages $nobreak");

$customfileinfo = "Pages: $pdfpages";
?>
