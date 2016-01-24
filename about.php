<?php
  $pageName = 'About';
  include_once 'inc/header.php';
?>
  <div id="about" class="container">
    <div class="row">
      <div class="column center"><h1><?php echo $fullCompanyName; ?></h1></div>
    </div>
    <div class="row">
      <div class="column">
<?php
if (file_exists('inc/about.html')) {
  include 'inc/about.html';
} else { 
?>
  <h2>Title</h2>
  <p> <a href="#">Lorem ipsum dolor sit amet</a>, consectetur adipiscing elit.
      Pellentesque leo elit, egestas dictum pharetra vitae, feugiat viverra odio.
      Vestibulum et ultrices est, placerat sagittis nisl. Morbi et eleifend ipsum.
      Ut consectetur viverra velit, sed cursus tellus viverra eu.
  <h3>Another title</h3>
  <p> Fusce massa neque, ullamcorper ac risus et, iaculis rhoncus nulla.
      Curabitur ac tempus mi. Vivamus aliquet leo nisi.
      Sed sagittis, sapien et rhoncus luctus, augue tellus posuere libero, ut faucibus urna metus ac erat.

<?php } ?>
      </div>
    </div>
  </div>
<?php include_once 'inc/footer.php' ?>
