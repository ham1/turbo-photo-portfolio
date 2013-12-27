<?php
// define some common variables
$DIR = 'portfolio';
$TDIR = 'thumbs';
$thumbSize = 150;

// define some common functions
function endsWith($haystack, $needle)
{
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}

function isJpg($fileName) {
    return endsWith($imageName, '.jpg') || endsWith($imageName, '.jpeg');
}

function stripFileExt($filename){
    return preg_replace("/\\.[^.\\s]+$/", '', $filename);
}

function listDir($startPath, $excludeList=array('.','..','.gitignore')) {
    return array_diff(scandir($startPath), $excludeList);
}

function makePath() {
    return implode('/', func_get_args());
}

function imagePath($imageName) {
	return makePath($DIR, $album, $imageName);
}

function thumbPath($imageName) {
	return makePath($TDIR, $album, $imageName);
}

function checkAndCreateThumbnail($imageName) {
	$imagePath = imagePath($imageName);
    $thumbPath = thumbPath($imageName);
    // make dir structure if needed
    if (!file_exists(dirname($thumbPath))) {
        mkdir(dirname($thumbPath), 0755, true);
    }
    if (!is_file($thumbPath)) {
	    // create thumbnail
	    $img = new Imagick($imagePath);
	    $img->cropThumbnailImage($thumbSize,$thumbSize);
	    $img->writeImage($thumbPath);
	    $img->destroy();
	}
}
?>