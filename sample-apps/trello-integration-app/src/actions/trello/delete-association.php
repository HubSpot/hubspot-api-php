<?php

use Repositories\AssociationRepository;

if (isset($_GET['hs_object_id'])) {
    AssociationRepository::delete($_GET['hs_object_id']);
}

http_response_code(204);
