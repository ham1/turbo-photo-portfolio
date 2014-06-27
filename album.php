<?php
$pageName = 'Album: ' . $_GET['album'];
include_once 'inc/header.php';
include_once 'inc/gallery.inc.php';

// makes sure the get variable is actually an album
$albumArray = listDir($DIR);
$album = $_GET['album'];
if (!in_array($album, $albumArray)) {
?>
<div class="container">
<h1 class="1of1 center">Album not valid.</h1>
<p class="1of1 center"><a href="portfolio.php">Go back to the portfolio page</a></p>
</div>
<?php
    include_once 'inc/footer.php';
    die();
}

// functions for generating prev and next links
function albumLink($nextOrPrev) {
    global $album;
    global $albumArray;
    $key = array_search($album, $albumArray);
    $count = count($albumArray);

    if ($nextOrPrev == 'next') {
        $key = ($key + 1) % $count;
    } else if ($nextOrPrev == 'prev') {
        $key = ($key + $count - 1) % $count;
    }

    $linkAlbumName = $albumArray[$key];
    return '<a href="album.php?album=' . $linkAlbumName . '" style="display:block">' . prettyPrintFileName($linkAlbumName) . '</a>';
        
}
function prevLink() {
    return albumLink('prev');
}
function nextLink() {
    return albumLink('next');
}
?>
        <div id="album" class="container">
        <div class="grid 1of4 center remove-padding prev-link"><?php echo prevLink(); ?></div>
        <div class="grid 2of4 center remove-padding album-title"><?php echo prettyPrintFileName($album); ?></div>
        <div class="grid 1of4 center remove-padding next-link"><?php echo nextLink(); ?></div>
        <div class="grid 1of1 remove-padding center">...</div>
<?php
// traverse album dir
$imageArray = listDir(makePath($DIR, $album));
foreach ($imageArray as $imageName) {
    // skip non-jpg files
    if (!isJpg($imageName)) {
        continue;
    }
	checkAndCreateThumbnail($album, $imageName);
?>

        <div class="album-image grid 1of4">
            <a href="<?php echo imagePath($album, $imageName); ?>" data-lightbox="<?php echo $album; ?>" title="<?php echo prettyPrintFileName($imageName); ?>">
                <img src="<?php echo thumbPath($album, $imageName); ?>" width="<?php echo $thumbSize; ?>" height="<?php echo $thumbSize; ?>" alt="<?php echo prettyPrintFileName($imageName); ?>"/>
            </a>
        </div>

<?php } ?>
        </div>
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/lightbox.min.js"></script>

<?php include_once 'inc/footer.php'; ?>

