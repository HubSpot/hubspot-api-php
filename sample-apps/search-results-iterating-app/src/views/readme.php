<?php include __DIR__.'/_partials/header.php'; ?>

<div class="column">
    <h3>Run the following command to see iterating via search results in action:</h3>
    <pre id="command">docker-compose exec web php /app/src/console/example.php</pre>
    <button class="button-primary" onclick="copyCommand()">Copy</button>
</div>

<?php include __DIR__.'/_partials/footer.php'; ?>
