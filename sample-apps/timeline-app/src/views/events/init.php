<?php include __DIR__.'/../_partials/header.php'; ?>

<h3 class="text-center">Initialization Script - press Go button to initialize event types</h3>
<div class="row">
    <div class="column column-20"></div>
    <div class="column column-60">
    <pre>
// src/actions/events/init.php - event types initialization script
$hubSpot->timeline()->createEventType(
        'HubSpot Application ID',
        'Event Type Name',
        'Header Template',
        'Detail Template',
        'Object Type'
    );
    </pre>
        <form method="post" class="text-center">
            <p>This script creates two event types.</p>
            <button type="submit">Go</button>
        </form>
    </div>
    <div class="column column-20"></div>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
