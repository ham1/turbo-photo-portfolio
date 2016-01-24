<?php
  $time_start = microtime(true); // performance measurement
  if (!extension_loaded('imagick')) {
    die('imagick not installed');
  }
  require_once('variables.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $pageName, ' - ', $fullCompanyName; ?></title>
  <meta name="description" content="<?php echo $description; ?>">
  <meta name="author" content="<?php echo $fullCompanyName; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link href="css/css_loader.php" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  <header>
    <nav class="row">
<?php
  function linkClassForNavLink($linkName) {
    $linkClass = ' button-clear';
    global $pageName;
    return ' class="column button' . (($pageName != $linkName) ? $linkClass : '') . '"';
  }
?>
      <a href="index.php"<?php echo linkClassForNavLink('Home'); ?>>Home</a>
      <a href="portfolio.php" rel="prefetch"<?php echo linkClassForNavLink('Portfolio'); ?>>Portfolio</a>
      <a href="<?php echo $blogAddress; ?>"<?php echo linkClassForNavLink('Blog'); ?>>Blog</a>
      <a href="about.php"<?php echo linkClassForNavLink('About'); ?>>About</a>
      <a href="contact.php"<?php echo linkClassForNavLink('Contact'); ?>>Contact</a>
    </nav>
  </header>

