<?php 
    $time_start = microtime(true);
    if (!isset($pageName)) {
     $pageName = '';
    }
    $navHighlight = ' class="current"';
    
    /********************************************************/
    /* User customisation                                   */
    /********************************************************/
    $toEmail = 'contact@grussellphotography.com';
    $copyright = 'Graham Russell';
    $description = 'A really fast and simple photo portfolio';
    $fullCompanyName = 'Graham Russell Photography';
    $companyName = 'GRussell Photography';
    $blogAddress = 'http://blog.grussellphotography.com/';
    /********************************************************/
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Needs ========================== -->
	<meta charset="utf-8">
	<title>Turbo Photography Portfolio - <?php echo $pageName; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="author" content="Graham Russell">

	<!-- Mobile Specific Metas ====================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS ======================================== -->
	<link rel="stylesheet" href="css/css_loader.php">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>

	<!-- Favicons =================================== -->
	<link rel="shortcut icon" href="img/favicon.png">
</head>
<body>
		<header class="container">
			<nav class="grid 5of6 remove-padding offset-2">
				<ul>
				<li><a href="index.php"<?php if ($pageName == 'Home') echo $navHighlight; ?>>Home</a>
				<li><a href="portfolio.php"<?php if ($pageName == 'Portfolio') echo $navHighlight; ?>>Portfolio</a>
				<li><a href="<?php echo $blogAddress; ?>">Blog</a>
				<li><a href="about.php"<?php if ($pageName == 'About') echo $navHighlight; ?>>About</a>
				<li><a href="contact.php"<?php if ($pageName == 'Contact') echo $navHighlight; ?>>Contact</a>
				</ul>
			</nav>
		</header>

