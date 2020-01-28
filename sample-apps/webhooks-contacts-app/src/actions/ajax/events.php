<?php

use Repositories\EventsRepository;

$notShownEventsCount = 0;

if (array_key_exists('mark', $_GET) && intval($_GET['mark'])) {
    $notShownEventsCount = EventsRepository::getNotShownEventsCount(intval($_GET['mark']));
}

echo json_encode([
    'notShownEventsCount' => $notShownEventsCount,
]);
