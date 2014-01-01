<?php
$pageName = 'Album: ' . $_GET['album'];
include_once 'inc/header.php';
include_once 'inc/gallery.inc.php';

// makes sure the get variable is actually an album
$albumArray = listDir($DIR);
$album = $_GET['album'];
if (!in_array($album, $albumArray)) {
    echo '<div class="container">
<h1 class="1of1 center">Album not valid.</h1>
<p class="1of1 center"><a href="portfolio.php">Go back to the portfolio page</a></p>
</div>';
    include_once 'inc/footer.php';
    die();
}

// helper functions for generating prev and next links
function albumLink($nextOrPrev) {
    global $album;
    global $albumArray;
    $key = array_search($album, $albumArray);

    if ($nextOrPrev == 'next') {
        if ($key != (count($albumArray) - 1)) {
            $key++;
        } else {
            $key = 0;
        }
    } else if ($nextOrPrev == 'prev') {
        if ($key != 0) {
            $key--;
        } else {
            $key = count($albumArray) - 1;
        }
    }

    $linkAlbumName = $albumArray[$key];
    return '<a href="album.php?album=' . $linkAlbumName . '" style="display:block;">' . $linkAlbumName . '</a>';
        
}
function prevLink() {
    return albumLink('prev');
}
function nextLink() {
    return albumLink('next');
}
?>
        <div id="album" class="container">
<?php
echo '<div class="grid 1of4 center remove-padding prev-link">', prevLink(), '</div>';
echo '<div class="grid 2of4 center remove-padding album-title">', $album, '</div>';
echo '<div class="grid 1of4 center remove-padding next-link">', nextLink(), '</div>
<div class="grid 1of1"></div>';
// traverse album dir
$imageArray = listDir(makePath($DIR, $album));
foreach ($imageArray as $imageName) {
    // skip non-jpg files
    if (!isJpg($imageName)) {
        continue;
    }
	checkAndCreateThumbnail($album, $imageName);
    echo '
        <div class="album-image grid 1of4">
          <a href="', imagePath($album, $imageName), '" data-lightbox="', $album, '" title="', stripFileExt($imageName), '">
            <img src="', thumbPath($album, $imageName), '" width="', $thumbSize, '" height="', $thumbSize, '" alt="', stripFileExt($imageName), '"/>
          </a>
        </div>', "\n";
}
echo '        </div>
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/lightbox-2.6.min.js"></script>';
include_once 'inc/footer.php';
?>
