<?php

require __DIR__ . '/../../vendor/autoload.php';

$search = new \IbgeKit\src\kits\Search();
echo json_encode($search->getAll());