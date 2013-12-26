<?php
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
        <div id="gallery" style="z-index:-100" class="container">
        <div class="grid 1of1 center">GRPhotography Portfolio</div>
<?php
/*
  4. output gallery html
*/
$DIR = 'portfolio';
$TDIR = 'thumbs';

// traverse portfolio dir
$albumArray = listDir($DIR);
$totalAlbums = count($albumArray);
$albumCount = 0;
$WIDTH = 3;
foreach ($albumArray as $albumName) {
        $albumCount++;
    echo '          <div class="album grid 1of'. $WIDTH .'">
        <h3>' . $albumName . '</h3>
        ';
    
    $imageArray = listDir(makePath($DIR, $albumName));
    $picsInCurrentAlbum = count($imageArray);
    foreach ($imageArray as $imageName) {
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
        echo '<a data-lightbox="' . $albumName . '" href="' . $imagePath . '" title="test1">
                 <img src="' . $thumbFilename . '" width="150" height="150" />
              </a>';
         // TODO:  
         break;
    }
    // close the album div
    echo "\n" . '           </div>' . "\n";
}
?>

        </div>
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/lightbox-2.6.min.js"></script>
<?php 
include_once 'footer.php';
?>
