<?php

namespace HubSpot;


$hubSpot = Factory::create();

$searchApi = $hubSpot->searchApi();
$searchApi->doSearch();
