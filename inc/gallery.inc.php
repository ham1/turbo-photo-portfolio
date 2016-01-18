<?php
// define some common variables
$DIR='portfolio';
$TDIR='thumbs';
require_once('variables.php');

// define some common functions
function endsWith($haystack, $needle)
{
    return $needle === '' || substr($haystack, -strlen($needle)) === $needle;
}

function isJpg($fileName) {
    return endsWith($fileName, '.jpg') || endsWith($fileName, '.jpeg');
}

function stripFileExt($filename) {
    return preg_replace("/\\.[^.\\s]+$/", '', $filename);
}

function prettyPrintFileName($filename) {
    $rtn = str_replace('_', ' ', stripFileExt($filename));
    global $removeLeadingDigitsFromImgName;
    if ($removeLeadingDigitsFromImgName) {
        $rtn = preg_replace('/^\d+ /', '', $rtn);
    }
    return htmlspecialchars($rtn);
}

function listDir($startPath, $excludeList=array('.','..','.gitignore')) {
    // array_values creates a 0-base index again
    return array_values(array_diff(scandir($startPath), $excludeList));
}

function getFirstJpgFile($path) {
    $firstFile = 'NOT_FOUND';
    $dir = opendir($path);
    while (($currentFile = readdir($dir)) !== false) {
        if (isJpg($currentFile) ) {
            $firstFile = $currentFile;
            break;
        }
    }
    closedir($dir);
    return $firstFile;
}

function makePath() {
    return implode('/', func_get_args());
}

function imagePath($album, $imageName) {
    global $DIR;
	return makePath($DIR, $album, $imageName);
}

function thumbPath($album, $imageName) {
    global $TDIR;
	return makePath($TDIR, $album, $imageName);
}

function checkAndCreateThumbnail($album, $imageName) {
    $thumbPath = thumbPath($album, $imageName);
    
    // make dir structure if needed
    $thumbDir = dirname($thumbPath);
    if (!file_exists($thumbDir)) {
        mkdir($thumbDir, 0755, true);
    }

    if (!is_writable($thumbDir)) {
        die('<pre>I do not seem to have have write permissions to the thumbs folder.</pre>');
    }
	
    // create thumbnail if it doesn't exist
    if (!is_file($thumbPath)) {
	    $imagePath = imagePath($album, $imageName);
	    $img = new Imagick($imagePath);
        global $thumbSize;
	    $img->cropThumbnailImage($thumbSize, $thumbSize);
        $imgWrittenSuccess = $img->writeImage($thumbPath);
	    $img->destroy();
        if (!$imgWrittenSuccess) {
            die('<pre>Cannot create image. Permission or disk space problem?</pre>');
        }
	}
}
?>
