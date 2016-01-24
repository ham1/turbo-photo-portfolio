<?php
$pageName = 'Portfolio';
include_once 'inc/header.php';
include_once 'inc/gallery.inc.php';
?>
  <div id="gallery">
<?php
// traverse portfolio dir
$albumArray = listDir($DIR);
$counter = 0;
foreach ($albumArray as $albumName) {
  $imageName = getFirstJpgFile(makePath($DIR, $albumName));
  checkAndCreateThumbnail($albumName, $imageName);
  if ($counter++ % 3 === 0) {
    echo "<!-- $counter -->", '<div class="row">';
  }
?>
    <div class="column column-33">
      <a href="album.php?album=<?php echo $albumName; ?>">
        <span class="album-title"><?php echo prettyPrintFileName($albumName); ?></span>
        <?php echo '<img src="', thumbPath($albumName, $imageName),
               '" width="', $thumbSize,
               '" height="', $thumbSize,
               '" alt="', prettyPrintFileName($imageName),
               '"/>', "\n"; ?>
      </a>
    </div>
<?php
  if ($counter % 3 === 0) {
    echo '</div>';
  }
}
?>
    </div>
<?php include_once 'inc/footer.php'; ?>
