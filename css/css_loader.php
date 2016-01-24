<?php
// The CSS files to combine
$cssFiles = array('melody.css', 'tpp.css', 'lightbox.min.css');

/* Deal with HTTP headers */

// Calculates last modified and md5 of the above files, including this php file
$lastModified = filemtime(__FILE__);
$etagHash = md5_file(__FILE__);
foreach ($cssFiles as $file) {
    $etagHash .= md5_file($file);
    $mod = filemtime($file);
    if ($mod > $lastModified) {
        $lastModified = $mod;
    }
}
$etagHash = md5($etagHash);

// Processes headers from the client
$ifModifiedSince =
    (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])
        ? @strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE'])
        : false);
$etagHeader =
    (isset($_SERVER['HTTP_IF_NONE_MATCH'])
        ? trim($_SERVER['HTTP_IF_NONE_MATCH'])
        : false);

// Sends headers back to the client
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $lastModified) . ' GMT');
header('Etag: ' . $etagHash);
$secondsPerWeek = 60 * 60 * 24 * 7;
header('Cache-Control: max-age=' . $secondsPerWeek . ', must-revalidate');
header('Expires: ' . gmdate ('D, d M Y H:i:s', time() + $secondsPerWeek) . ' GMT');
header('Content-type: text/css');

// check if page has changed. If not, send 304 and exit
if ($ifModifiedSince == $lastModified || $etagHeader == $etagHash) {
    header('HTTP/1.1 304 Not Modified');
    exit();
}

/* send the content */

// output minified CSS input files first
// i.e. file names ending in .min.css
foreach($cssFiles as $key => $file) {
    if (substr($file, -8) === '.min.css') {
        include($file);
        unset($cssFiles[$key]);
    }
}

ob_start('simpleCSSMinify');

function simpleCSSMinify($buffer) {
    // remove comments, new lines and tabs
    $regexToRemoveArray = array('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '/[\n\t]+/');
    $buffer = preg_replace($regexToRemoveArray, '', $buffer);
    // remove multiple spaces
    $buffer = preg_replace('/\s+/', ' ', $buffer);
    // remove spaces after , and ;
    $buffer = str_replace(', ', ',', $buffer);
    $buffer = str_replace('; ', ';', $buffer);
    return $buffer;
}

foreach($cssFiles as $file) {
    include($file);
}
ob_end_flush();
?>
