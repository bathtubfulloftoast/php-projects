<h1><?php echo "$file"; ?></h1>
<code><?php
    ob_start();
    echo file_get_contents($dir.$file);
    $content = ob_get_contents();
    ob_clean();
    
    $content = str_replace('&', '&amp;', $content);

    $content = str_replace('<', '&lt;', $content);

    $content = str_replace('>', '&gt;', $content);
    
    //$content = str_replace("", '&nbsp; ', $content);

    //$content = str_replace("\n", "<br>", $content);

    echo "$content";
    
?></code>


