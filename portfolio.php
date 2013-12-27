<?php
$pageName = 'Portfolio';
include_once 'header.php';
include_once 'gallery.inc.php';
?>
        <div id="gallery" class="container">
        <div class="grid 1of1 center remove-padding"></div>
<?php
// traverse portfolio dir
$albumArray = listDir($DIR);
foreach ($albumArray as $albumName) {
    $imageArray = listDir(makePath($DIR, $albumName));
    $imageName = reset($imageArray); // get the first image (using reset)
    if (!isJpg($imageName)) {
        echo '<p>WARN: First file in album ' . $albumName .' is not a .jpg file!';
        continue;
    }
    checkAndCreateThumbnail($albumName, $imageName);
    echo '
          <div class="album grid 1of3">
            <a href="album.php?album=' . $albumName . '" title="Album: '. $albumName .'">
              <h2>' . $albumName . '</h2>
              <img src="' . thumbPath($albumName, $imageName) . '" width="'. $thumbSize .'" height="'. $thumbSize .'" />
            </a>
          </div>' . "\n";
}
echo '        </div>';
include_once 'footer.php';
?>
