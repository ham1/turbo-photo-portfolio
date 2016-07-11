<?php
  $pageName = 'About';
  include_once 'inc/header.php';
?>
  <div class="container">
  <div class="grid 1of1 center" >
    <h1><?php echo $fullCompanyName; ?></h1>
  </div>
  <div class="grid 1of1 center remove-padding about">
  <?php include 'inc/about.html'; ?>
  </div>
  </div>
<?php include_once 'inc/footer.php' ?>
