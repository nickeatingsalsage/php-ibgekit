<?php

require __DIR__ . '/../../vendor/autoload.php';

$search = new \IbgeKit\src\kits\StateSearch();
if ($search->exists(33))
    echo "Record exists.";
else
    echo "Record not found.";