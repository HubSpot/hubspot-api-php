<?php

use Helpers\TrelloApi;

$boards = TrelloApi::getBoards();

include __DIR__.'/../../views/mappings/boards.php';
