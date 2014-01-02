<?php
$pageName = 'Portfolio';
include_once 'inc/header.php';
include_once 'inc/gallery.inc.php';
?>
        <div id="gallery" class="container">
        <div class="grid 1of1 center remove-padding"></div>
<?php
// traverse portfolio dir
$albumArray = listDir($DIR);
foreach ($albumArray as $albumName) {
    $imageName = getFirstJpgFile(makePath($DIR, $albumName));
    checkAndCreateThumbnail($albumName, $imageName);
    $albumText = prettyPrintFileName($albumName);
    echo '
          <div class="album grid 1of3">
            <a href="album.php?album=', $albumName, '" title="Album: ', $albumText, '">
              <span class="album-title">', $albumText, '</span>
              <img src="', thumbPath($albumName, $imageName), '" width="', $thumbSize, '" height="', $thumbSize, '" alt="' ,  prettyPrintFileName($imageName) , '"/>
            </a>
          </div>', "\n";
}
echo '        </div>';
include_once 'inc/footer.php';
?>
