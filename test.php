<?php
$startpath = 'portfolio/';

function dir_nav($startPath, $exclude_list = array('.', '..', '.gitignore')) {
  $directories = array_diff(scandir($startPath), $exclude_list);
  foreach($directories as $entry) {
    if (is_dir($startPath.$entry)) {
      echo $entry.'<br />';
    }
  }
  foreach($directories as $entry) {
    if(is_file($startPath.$entry)) {
    }
  }
}

dir_nav($startpath);

?>
