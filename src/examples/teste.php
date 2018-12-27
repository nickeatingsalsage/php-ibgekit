<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // change the path to your own autoload

$search = new \IbgeKit\src\kits\locations\CountiesSearch();
echo json_encode($search->getAll());