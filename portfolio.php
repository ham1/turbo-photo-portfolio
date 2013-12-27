<?php
$pageName = 'Portfolio';
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

?>
        <div id="gallery" class="container">
        <div class="grid 1of1 center remove-padding"></div>
<?php
$DIR = 'portfolio';
$TDIR = 'thumbs';

// traverse portfolio dir
$albumArray = listDir($DIR);
foreach ($albumArray as $albumName) {
    echo '          <div class="album grid 1of3">';
    $imageArray = listDir(makePath($DIR, $albumName));
    $imageName = array_values($imageArray)[0];
    $imagePath = makePath($DIR, $albumName, $imageName);
    // check if thumbnail file exists
    $thumbFilename = makePath($TDIR, $albumName, $imageName);
    if (!is_file($thumbFilename)) {
        // create it
        $img = new Imagick($imagePath);
        // make dir structure if needed
        if (!file_exists(dirname($thumbFilename))) {
            mkdir(dirname($thumbFilename), 0755, true);
        }
        $img->cropThumbnailImage(150,150);
        $img->writeImage($thumbFilename);
        $img->destroy();
    }
    echo '<a href="album.php?album=' . $albumName . '" title="Album: '. $albumName .'">
                <h2>' . $albumName . '</h2>
                <img src="' . $thumbFilename . '" width="150" height="150" />
            </a>';
    // close the album div
    echo "\n" . '         </div>' . "\n";
}
echo '        </div>';
include_once 'footer.php';
?>
