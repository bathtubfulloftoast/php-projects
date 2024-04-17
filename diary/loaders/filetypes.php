<?php
switch ($filext) {
    case 'txt':
    case 'html':
    case 'htm':
    case 'php':
    case 'json':
    case 'js':
    case 'md':
    case 'css':
    case 'sh':
    case 'cpp':
    case 'webmanifest':
        $filetype = '0';
        break;
    case 'png':
    case 'jpg':
    case 'jpeg':
    case 'gif':
    case 'webp':
    case 'svg':
    case 'bmp':
    case 'ico':
    case 'avif':
        $filetype = '1';
        break;
    case 'mp4':
    case 'webm':
        $filetype = '2';
        break;
    case 'mp3':
    case 'ogg':
    case 'opus':
    case 'wav':
    case 'flac':
        $filetype = '3';
        break;
    case 'pdf':
        $filetype = '4';
        break;
    case 'glb':
    case 'gltf':
        $filetype = '5';
        break;
    default:
        // Handle unknown extensions appropriately (e.g., set a default or throw an exception)
        $filetype = 'null';  // Example default
}
?>
