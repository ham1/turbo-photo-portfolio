<?php
/**
 * Combines and minifies specified CSS files. Tested with https://redbot.org
 *
 * NB. Order of output not guaranteed, e.g. minified css files are output first.
 * Also, services like Cloudflare seem to break the 304 functionality.
 */
// The CSS files to combine
$cssFiles = array('melody.css', 'tpp.css', 'lightbox.min.css');

/* HTTP headers */

// Calculates last modified and md5 of CSS files and this php script
$lastModified = filemtime(__FILE__);
$fileHash = md5_file(__FILE__);
foreach ($cssFiles as $file) {
    $fileHash .= md5_file($file);
    $mod = filemtime($file);
    if ($mod > $lastModified) {
        $lastModified = $mod;
    }
}
$eTagHash = md5($fileHash);

// Sends headers back to the client
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $lastModified) . ' GMT');
header('ETag: "' . $eTagHash . '"');
$secondsPerWeek = 60 * 60 * 24 * 7;
// set cache age to 1 week
// omitting 'must-revalidate' allows serving of stale cache
// further reduces network traffic i.e. no need to check for 304
header('Cache-Control: max-age=' . $secondsPerWeek);

// check if page has changed. If not, send 304 and exit
if ((isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])
        &&
        strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $lastModified)
    ||
    (isset($_SERVER['HTTP_IF_NONE_MATCH'])
        &&
        strpos($_SERVER['HTTP_IF_NONE_MATCH'], $eTagHash) !== false))
{
    header('HTTP/1.1 304 Not Modified');
    exit();
}
// Content-type needed for the body, not required if we send the 304 above.
header('Content-type: text/css');

/* Send the content */

// output minified CSS input files first i.e. file names ending in .min.css
foreach($cssFiles as $key => $file) {
    if (substr($file, -8) === '.min.css') {
        include($file); // output the already minified file
        unset($cssFiles[$key]); // remove file name from file list
    }
}

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

// output css files after running them through the minify function first
ob_start('simpleCSSMinify');
foreach($cssFiles as $file) {
    include($file);
}
ob_end_flush();
?>
