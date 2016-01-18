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
?>
    <div class="album grid 1of3">
      <a href="album.php?album=<?php echo $albumName; ?>">
        <span class="album-title"><?php echo prettyPrintFileName($albumName); ?></span>
        <img src="<?php echo thumbPath($albumName, $imageName); ?>" width="<?php echo $thumbSize; ?>" height="<?php echo $thumbSize; ?>" alt="<?php echo prettyPrintFileName($imageName); ?>"/>
      </a>
    </div>
<?php }?>
    </div>
<?php include_once 'inc/footer.php'; ?>
