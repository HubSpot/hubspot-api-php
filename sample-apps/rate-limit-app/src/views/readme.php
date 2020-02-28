<?php include __DIR__.'/_partials/header.php'; ?>

<h3 class="text-center">Workers are started</h3>
<h4 class="text-center">Please note this app started <?php echo getEnvOrException('PROCESS_COUNT'); ?> workers in order to reach rate limit's border faster.</h4>
<h3 class="text-center">In order to continue please go to the terminal and run the following command</h3>
<pre>docker-compose exec web php /app/src/console/example.php</pre>

<?php include __DIR__.'/_partials/footer.php'; ?>
