<!--Embed-->
<meta content="<?php echo "$file"; ?>" property="og:title" />
    <meta content="<?php echo "$filext file avalible on novassite"; ?>" property="og:description" />
<meta content="#6b0059" data-react-helmet="true" name="theme-color" />

<h1><?php echo "$file"; ?></h1>
<code>
<?php


    ob_start();
    echo file_get_contents($dir.$file);
    $content = ob_get_contents();
    ob_clean();

    $content = str_replace('<', '&lt;', $content);

    $content = str_replace("\n", '<br>', $content);





    echo $content;
?>
</code>
