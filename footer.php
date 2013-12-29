<footer>
<?php echo '&copy; ', $copyright, ' :: ', date('Y'); ?>

</footer>
<?php
echo '<!-- generated in: ', round((microtime(true) - $time_start)*1000, 2), 'ms -->';
?>

</body>
</html>
