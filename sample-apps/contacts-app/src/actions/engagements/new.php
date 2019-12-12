<?php

if (isset($_GET['contactId'])) {
    $contactId = $_GET['contactId'];
}

include __DIR__.'/../../views/engagements/show.php';
