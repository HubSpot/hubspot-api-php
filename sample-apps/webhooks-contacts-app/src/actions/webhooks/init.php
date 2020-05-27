<?php

use Helpers\HubspotClientHelper;
use Helpers\UrlHelper;
use HubSpot\Client\Webhooks\Model\BatchInputSubscriptionBatchUpdateRequest;
use HubSpot\Client\Webhooks\Model\SettingsChangeRequest;
use HubSpot\Client\Webhooks\Model\SettingsResponse;
use HubSpot\Client\Webhooks\Model\SubscriptionBatchUpdateRequest;
use HubSpot\Client\Webhooks\Model\SubscriptionCreateRequest;

$appUrl = UrlHelper::generateServerUri().'/webhooks/handle.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    include __DIR__.'/../../views/webhooks/init.php';
    exit();
}

$webhooksClient = HubspotClientHelper::createFactoryWithDeveloperAPIKey()
    ->webhooks()
;

$appId = getEnvOrException('HUBSPOT_APPLICATION_ID');

$updateSubscriptions = function (array $ids, bool $activity) use ($appId, $webhooksClient) {
    if (count($ids) > 0) {
        $subscriptionRequests = [];

        foreach ($ids as $id) {
            $subscriptionRequest = new SubscriptionBatchUpdateRequest();
            $subscriptionRequest->setId($id);
            $subscriptionRequest->setActive($activity);

            $subscriptionRequests[] = $subscriptionRequest;
        }

        $subscriptionsRequest = new BatchInputSubscriptionBatchUpdateRequest();
        $subscriptionsRequest->setInputs($subscriptionRequests);

        $webhooksClient->subscriptionsApi()->updateBatch($appId, $subscriptionsRequest);
    }
};

$necessarySubscriptions = [
    'contact.creation' => null,
    'contact.propertyChange' => null,
    'contact.deletion' => null,
];

$activeSubscriptions = [];

$subscriptions = $webhooksClient->subscriptionsApi()->getAll($appId);

foreach ($subscriptions->getResults() as $subscription) {
    if (
            array_key_exists($subscription->getEventType(), $necessarySubscriptions)
            && (
                (null == $subscription->getPropertyName())
                || ('firstname' == $subscription->getPropertyName())
            )
        ) {
        
        $necessarySubscriptions[$subscription->getEventType()] = $subscription->getId();
        $activeSubscriptions[] = $subscription->getId();
        
    } else {
        if ($subscription->getActive()) {
            $activeSubscriptions[] = $subscription->getId();
        }
    }
}

$updateSubscriptions($activeSubscriptions, false);

$request = new SettingsChangeRequest();
$request->setTargetUrl($appUrl);

$response = $webhooksClient->settingsApi()
    ->configure($appId, $request)
;

foreach ($necessarySubscriptions as $eventType => $subscriptionId) {
    if (is_null($subscriptionId)) {
        $request = new SubscriptionCreateRequest();
        $request->setEventType($eventType);
        $request->setActive(true);

        if ('contact.propertyChange' == $eventType) {
            $request->setPropertyName('firstname');
        }

        $webhooksClient->subscriptionsApi()->create($appId, $request);
    }
}

$updateSubscriptions($activeSubscriptions, true);

$settings = $webhooksClient->settingsApi()->getAll($appId);

if (($settings instanceof SettingsResponse) && ($settings->getTargetUrl() == $appUrl)) {
    $_SESSION['init'] = true;
} else {
    throw new Exception('Something went wrong...');
}

header('Location: /webhooks/events.php');
