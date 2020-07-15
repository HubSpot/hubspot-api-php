<?php

use Formatters\CardsFormatter;

header('Content-Type: application/json');
echo json_encode(CardsFormatter::cardExtensionDataResponse());
