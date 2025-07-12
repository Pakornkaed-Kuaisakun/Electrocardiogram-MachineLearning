<?php
function getPath($filename)
{// many case
    if ($filename == 'THIS') {
        $filename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
    }
    $HOST = $_SERVER['HTTP_HOST'];
    $URI = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    return "https://$HOST$URI/$filename";
}

function getPathImage($imageName)
{
    $HOST = $_SERVER['HTTP_HOST'];

    return "https://$HOST/ECGWebApp/dist/image/$imageName";
}

function getPathCSS($filename)
{
    $HOST = $_SERVER['HTTP_HOST'];

    return "https://$HOST/ECGWebApp/dist/css/$filename";
}

function getPathJS($filename)
{
    $HOST = $_SERVER['HTTP_HOST'];

    return "https://$HOST/ECGWebApp/dist/js/$filename";
}
?>