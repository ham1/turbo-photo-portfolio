<?php
  $time_start = microtime(true); // performance measurement
  require_once('variables.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $fullCompanyName, ' - ', $pageName; ?></title>
  <meta name="description" content="<?php echo $description; ?>">
  <meta name="author" content="<?php echo $fullCompanyName; ?>">
  <!-- Mobile Specific Metas === -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- CSS ===================== -->
  <link  href='css/css_loader.php' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
  <!-- Favicon ================= -->
  <link rel="shortcut icon" href="img/favicon.png">
</head>
<body>
  <header class="container">
    <nav class="grid 5of6 remove-padding offset-2">
    <ul>
    <li><a href="index.php"<?php
      $navHighlight = ' class="current"';
      if ($pageName == 'Home') echo $navHighlight; ?>>Home</a>
    <li><a href="portfolio.php"<?php
      if ($pageName == 'Home') echo 'rel="prerender"';
      if ($pageName == 'Portfolio') echo $navHighlight; ?>>Portfolio</a>
    <li><a href="<?php echo $blogAddress; ?>">Blog</a>
    <li><a href="about.php"<?php
      if ($pageName == 'About') echo $navHighlight; ?>>About</a>
    <li><a href="contact.php"<?php
      if ($pageName == 'Contact') echo $navHighlight; ?>>Contact</a>
    </ul>
    </nav>
  </header>

