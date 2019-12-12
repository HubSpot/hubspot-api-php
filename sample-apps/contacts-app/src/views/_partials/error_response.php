<?php if (isset($errorResponse)) { ?>
    <div class="error-wrapper">
        <h4>API returned an <span class="result">Error</span>:</h4>
        <h4>Status Code: <?php echo htmlentities($errorResponse->getStatusCode()); ?></h4>
        <pre><?php print_r($errorResponse->getData()); ?></pre>
    </div>
<?php } ?>