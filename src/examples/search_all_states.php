<?php

require_once __DIR__ . '/../kits/StateSearch.php';

use PhpIbgeKit\Src\Kits\StateSearch;

$search = new StateSearch();
echo json_encode($search->getAll());