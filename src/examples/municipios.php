<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // change the path to your own autoload

$search = new \IbgeKit\src\kits\locations\CountiesSearch();
$county = $search->getAll();
?>
<ul>
    <?php foreach ($county as $obj): ?>
        <li>
            <?= $obj->nome ?>
        </li>
    <?php endforeach; ?>
</ul>
