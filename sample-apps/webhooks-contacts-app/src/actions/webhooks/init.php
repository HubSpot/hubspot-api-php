<?php

use Helpers\HubspotClientHelper;
use Helpers\UrlHelper;
use Helpers\WebhooksHelper;
use HubSpot\Client\Webhooks\Model\SettingsChangeRequest;
use HubSpot\Client\Webhooks\Model\SettingsResponse;

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    include __DIR__.'/../../views/webhooks/init.php';

    exit();
}

$webhooksClient = HubspotClientHelper::createFactoryWithDeveloperAPIKey()
    ->webhooks()
;

$appId = getEnvOrException('HUBSPOT_APPLICATION_ID');
$appUrl = UrlHelper::generateServerUri().'/webhooks/handle';

$subscriptions = $webhooksClient->subscriptionsApi()->getAll($appId);

$activeSubscriptions = WebhooksHelper::getActiveSubscriptions($subscriptions->getResults());
$necessarySubscriptions = WebhooksHelper::getNecessarySubscriptions($subscriptions->getResults());

WebhooksHelper::updateSubscriptions($appId, $activeSubscriptions, false);

$request = new SettingsChangeRequest();
$request->setTargetUrl($appUrl);

$response = $webhooksClient->settingsApi()
    ->configure($appId, $request)
;

WebhooksHelper::createSubscriptions(
    $appId,
    $necessarySubscriptions
);

WebhooksHelper::updateSubscriptions(
    $appId,
    array_filter(array_values($necessarySubscriptions)),
    true
);

$settings = $webhooksClient->settingsApi()->getAll($appId);

if (($settings instanceof SettingsResponse) && ($settings->getTargetUrl() == $appUrl)) {
    $_SESSION['init'] = true;
} else {
    throw new Exception('Something went wrong...');
}

header('Location: /webhooks/events');
