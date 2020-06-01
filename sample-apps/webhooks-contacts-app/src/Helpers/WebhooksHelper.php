<?php

namespace Helpers;

use HubSpot\Client\Webhooks\Model\BatchInputSubscriptionBatchUpdateRequest;
use HubSpot\Client\Webhooks\Model\SubscriptionBatchUpdateRequest;
use HubSpot\Client\Webhooks\Model\SubscriptionCreateRequest;

class WebhooksHelper
{
    public static function updateSubscriptions(int $appId, array $ids, bool $activity)
    {
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

            HubspotClientHelper::createFactoryWithDeveloperAPIKey()
                ->webhooks()->subscriptionsApi()
                ->updateBatch($appId, $subscriptionsRequest)
            ;
        }
    }

    public static function getActiveSubscriptions(array $subscriptions): array
    {
        $results = [];
        foreach ($subscriptions as $subscription) {
            if ($subscription->getActive()) {
                $results[] = $subscription->getId();
            }
        }

        return $results;
    }

    public static function getNecessarySubscriptions(array $subscriptions): array
    {
        $results = [
            'contact.creation' => null,
            'contact.propertyChange' => null,
            'contact.deletion' => null,
        ];

        foreach ($subscriptions as $subscription) {
            if (
                    array_key_exists($subscription->getEventType(), $results)
                    && (
                        (null == $subscription->getPropertyName())
                        || ('firstname' == $subscription->getPropertyName())
                    )
                ) {
                $results[$subscription->getEventType()] = $subscription->getId();
            }
        }

        return $results;
    }

    public static function createSubscriptions($appId, $subscriptions)
    {
        foreach ($subscriptions as $eventType => $subscriptionId) {
            if (is_null($subscriptionId)) {
                $request = new SubscriptionCreateRequest();
                $request->setEventType($eventType);
                $request->setActive(true);

                if ('contact.propertyChange' == $eventType) {
                    $request->setPropertyName('firstname');
                }

                HubspotClientHelper::createFactoryWithDeveloperAPIKey()
                    ->webhooks()
                    ->subscriptionsApi()->create($appId, $request);
            }
        }
    }
}
