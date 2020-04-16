<?php include __DIR__.'/../_partials/header.php'; ?>

<h3 class="text-center">Initialization Script - press Go button to initialize event templates</h3>
<div class="row">
    <div class="column column-20"></div>
    <div class="column column-60">
    <pre>
// src/actions/events/init.php - event templates initialization script
$request = new \HubSpot\Client\Crm\Timeline\Model\TimelineEventTemplateCreateRequest();
$request->setName('Event Template Name');
$request->setHeaderTemplate('Header Template');
$request->setDetailTemplate('Detail Template');
$request->setObjectType('Object Type');

$hubSpot->crm()->timeline()->templatesApi()
    ->create('HubSpot Application ID', $request);
    </pre>
        <form method="post" class="text-center">
            <p>This script creates two event templates.</p>
            <button type="submit">Go</button>
        </form>
    </div>
    <div class="column column-20"></div>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
