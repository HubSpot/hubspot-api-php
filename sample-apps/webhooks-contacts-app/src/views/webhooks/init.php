<?php include __DIR__.'/../_partials/header.php'; ?>

<h3 class="text-center">Initialization Script</h3>
<h4 class="text-center">Press Go button to subscribe to the following events and set Target URL to <?php echo $appUrl; ?></h4>
<div class="row">
    <div class="column column-20"></div>
    <div class="column column-60">
        Events
        <ul>
            <li>Contact's Creation (contact.creation)</li>
            <li>Changing of Contact's Fist Name (contact.propertyChange)</li>
            <li>Contact's Deletion (contact.deletion)</li>
        </ul>
    <pre>
// src/actions/webhooks/init.php 
//set Target URL
$request = new SettingsChangeRequest();
$request->setTargetUrl($appUrl);

$hubSpot->webhooks()->settingsApi()
    ->configureSettings($appId, $request);

//Subscribe to an event
$request = new \HubSpot\Client\Webhooks\Model\SubscriptionCreateRequest();
$request->setEventType('contact.propertyChange');
$request->setPropertyName('firstname');
$request->setActive(true);

$hubSpot->webhooks()
    ->subscriptionsApi()->subscribe($appId, $request);
    </pre>
        <form method="post" class="text-center">
            <button type="submit">Go</button>
        </form>
    </div>
    <div class="column column-20"></div>
</div>

<?php include __DIR__.'/../_partials/footer.php'; ?>
