<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use IbgeKit\src\kits\locations\StateSearch;

$stateSearch = new StateSearch();
echo var_dump($stateSearch->getAll());
