<?php
$pageName = 'Album: ' . $_GET['album'];
include_once 'header.php';

function endsWith($haystack, $needle)
{
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}

function listDir($startPath, $excludeList=array('.','..','.gitignore')) {
    return array_diff(scandir($startPath), $excludeList);
}

function makePath() {
    return implode('/', func_get_args());
}

// makes sure the get variable is actually an album
$DIR = 'portfolio';
$TDIR = 'thumbs';
$albumArray = listDir($DIR);
$album = $_GET['album'];
if (!in_array($album, $albumArray)) {
    die('Album not valid.');
}
?>
        <div id="album" class="container">
        <div class="grid 1of1 center remove-padding"><?php echo $album; ?></div>
<?php
// traverse album dir
$imageArray = listDir(makePath($DIR, $album));
foreach ($imageArray as $imageName) {
    echo '          <div class="album grid 1of4">
            ';
    $imagePath = makePath($DIR, $album, $imageName);
    // check if thumbnail file exists
    $thumbPath = makePath($TDIR, $album, $imageName);
    $thumbSize = 150;
    if (!is_file($thumbPath)) {
        // create it
        $img = new Imagick($imagePath);
        // make dir structure if needed
        if (!file_exists(dirname($thumbPath))) {
            mkdir(dirname($thumbPath), 0755, true);
        }
        $img->cropThumbnailImage($thumbSize,$thumbSize);
        $img->writeImage($thumbPath);
        $img->destroy();
    }
    echo '<a data-lightbox="' . $album . '" href="' . $imagePath . '" title="' . $imageName . '">
                <img src="' . $thumbPath . '" width="'. $thumbSize .'" height="'. $thumbSize .'" />
            </a>';
    // close the image div
    echo "\n" . '         </div>' . "\n";
}
?>

        </div>
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/lightbox-2.6.min.js"></script>
<?php 
include_once 'footer.php';
?>
