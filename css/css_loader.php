<?php
header('Content-type: text/css');
$offset = 60 * 60 * 24 * 7; // Cache for a week
header ('Cache-Control: max-age=' . $offset . ', must-revalidate');
header ('Expires: ' . gmdate ('D, d M Y H:i:s', time() + $offset) . ' GMT');
ob_start('compress');
function compress($buffer) {
    /* remove comments */
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    /* remove double newlines and all tabs, spaces */
    $buffer = str_replace(array("\r\n\r\n", "\r\r", "\n\n", "\t", '  ', '    ', '    '), '', $buffer);
    return $buffer;
}
include('melody.css');
include('tpp.css');
include('lightbox.css');
ob_end_flush();
?>
