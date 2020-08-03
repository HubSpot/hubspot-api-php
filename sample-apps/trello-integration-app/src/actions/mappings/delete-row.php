<?php

use Repositories\MappingsRepository;

if (!isset($_GET['board_id'])
        || !isset($_GET['pipeline_id'])
        || !isset($_GET['mapping_id'])) {
    header('Location: /mappings/boards');
}

MappingsRepository::delete($_GET['mapping_id']);

unset($_GET['mapping_id']);

header('Location: /mappings/list?'.http_build_query($_GET));
