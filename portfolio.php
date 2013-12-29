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
    $imageName = getFirstJpgFile(makePath($DIR, $albumName));
    checkAndCreateThumbnail($albumName, $imageName);
    echo '
          <div class="album grid 1of3">
            <a href="album.php?album=', $albumName, '" title="Album: ', $albumName, '">
              <span class="album-title">', $albumName, '</span>
              <img src="', thumbPath($albumName, $imageName), '" width="', $thumbSize, '" height="', $thumbSize, '" alt="' ,  stripFileExt($imageName) , '"/>
            </a>
          </div>', "\n";
}
echo '        </div>';
include_once 'footer.php';
?>
