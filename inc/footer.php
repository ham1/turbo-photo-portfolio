<footer>
<?php echo '&copy; ', $copyright, ' :: ', gmdate('Y'); ?>

</footer>
<?php 
if (file_exists('inc/tracking.html')) {
    include_once 'inc/tracking.html';
}
echo '<!-- generated in: ', round((microtime(true) - $time_start)*1000, 2), 'ms -->'; ?>

</body>
</html>
