<!--Embed-->
<meta content="<?php echo "$file"; ?>" property="og:title" />
<meta content="<?php echo "/test/$dir$file"; ?>" property="og:video" />
<meta content="<?php echo "/test/$dir$file"; ?>" property="og:video:secure_url" />
<meta property="og:type" content="video">
<meta content="#6b0059" data-react-helmet="true" name="theme-color" />

<link href="vjs/video-js.css" rel="stylesheet">
<script src="vjs/video.min.js"></script>
<h1><?php echo "$file"; ?></h1>
<video class="video-js" data-setup="{}" controls src="<?php echo $dir.$file; ?>"></video>
