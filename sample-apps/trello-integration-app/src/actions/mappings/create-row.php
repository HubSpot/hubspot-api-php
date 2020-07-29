<?php

use Repositories\MappingsRepository;

if (!isset($_GET['board_id']) || !isset($_GET['pipeline_id'])) {
    header('Location: /mappings/boards');
}

if (isset($_POST['list_id'], $_POST['stage_id'])) {
    MappingsRepository::create(
        $_GET['board_id'],
        $_POST['list_id'],
        $_GET['pipeline_id'],
        $_POST['stage_id']
    );
}

header('Location: /mappings/list?'.http_build_query($_GET));
