<?php
    $pageName = 'About';
    include_once 'inc/header.php';
?>
        <div class="container">
        <div class="grid 1of1 center" >
			<h1><?php echo $fullCompanyName; ?></h1>
        </div>
		<div class="grid 1of1 center remove-padding about">
<?php
if (file_exists('inc/about.html')) {
    include 'inc/about.html';
} else { ?>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque leo elit, egestas dictum pharetra vitae, feugiat viverra odio. Vestibulum et ultrices est, placerat sagittis nisl. Morbi et eleifend ipsum. Ut consectetur viverra velit, sed cursus tellus viverra eu. Fusce massa neque, ullamcorper ac risus et, iaculis rhoncus nulla. Curabitur ac tempus mi. Vivamus aliquet leo nisi. Sed sagittis, sapien et rhoncus luctus, augue tellus posuere libero, ut faucibus urna metus ac erat.
<?php } ?>
		</div>
        </div>
<?php include_once 'inc/footer.php' ?>
