<?php

sleep(2);

require_once '/app/vendor/autoload.php';
use Helpers\KafkaHelper;

KafkaHelper::getConsumer([$_ENV['EVENT_TOPIC']])
    ->start(function ($topic, $part, $message): void {
        $event = (array) json_decode($message['message']['value']);

        var_dump($event);

        \Repositories\EventsRepository::saveEvent($event);
    })
;
