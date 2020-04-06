<?php

use Helpers\HubspotClientHelper;
use Helpers\UrlHelper;
use HubSpot\Client\Webhooks\Model\SettingsChangeRequest;
use HubSpot\Client\Webhooks\Model\SettingsResponse;
use HubSpot\Client\Webhooks\Model\SubscriptionCreateRequest;
use HubSpot\Client\Webhooks\Model\SubscriptionPatchRequest;

$appUrl = UrlHelper::generateServerUri().'/webhooks/handle.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    include __DIR__.'/../../views/webhooks/init.php';
    exit();
}

$webhooksClient = HubspotClientHelper::createFactoryWithDeveloperAPIKey()
    ->webhooks()
;

$appId = getEnvOrException('HUBSPOT_APP_ID');

$necessarySubscriptions = [
    'contact.creation' => null,
    'contact.propertyChange' => null,
    'contact.deletion' => null,
];

$activeSubscriptions = [];

$subscriptions = $webhooksClient->subscriptionsApi()->getSubscriptions($appId);

foreach ($subscriptions->getResults() as $subscription) {
    if (
            array_key_exists($subscription->getEventType(), $necessarySubscriptions)
            && (
                (null == $subscription->getPropertyName())
                || ('firstname' == $subscription->getPropertyName())
            )
        ) {
        $necessarySubscriptions[$subscription->getEventType()] = $subscription->getId();
    } elseif ($subscription->getActive()) {
        $activeSubscriptions[] = $subscription->getId();
    }

    if ($subscription->getActive()) {
        $subscriptionRequest = new SubscriptionPatchRequest();
        $subscriptionRequest->setEnabled(false);
        $webhooksClient->subscriptionsApi()
            ->updateSubscription($subscription->getId(), $appId, $subscriptionRequest)
        ;
    }
}

$request = new SettingsChangeRequest();
$request->setTargetUrl($appUrl);

$response = $webhooksClient->settingsApi()
    ->configureSettings($appId, $request)
;

foreach ($necessarySubscriptions as $eventType => $subscriptionId) {
    if (is_null($subscriptionId)) {
        $request = new SubscriptionCreateRequest();
        $request->setEventType($eventType);
        $request->setActive(true);

        if ('contact.propertyChange' == $eventType) {
            $request->setPropertyName('firstname');
        }

        $webhooksClient->subscriptionsApi()->subscribe($appId, $request);
    } else {
        $activeSubscriptions[] = $subscriptionId;
    }
}

foreach ($activeSubscriptions as $subscriptionId) {
    $subscriptionRequest = new SubscriptionPatchRequest();
    $subscriptionRequest->setEnabled(true);
    $webhooksClient->subscriptionsApi()
        ->updateSubscription($subscriptionId, $appId, $subscriptionRequest)
    ;
}
$settings = $webhooksClient->settingsApi()->getSettings($appId);

if (($settings instanceof SettingsResponse) && ($settings->getTargetUrl() == $appUrl)) {
    $_SESSION['init'] = true;
} else {
    throw new Exception('Something went wrong...');
}

header('Location: /webhooks/events.php');
