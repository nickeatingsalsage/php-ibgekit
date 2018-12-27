<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // change the path to your own autoload

$search = new \IbgeKit\src\kits\locations\RegionSearch();
$region = $search->getAll([1,4]);
?>
<ul>
    <?php foreach ($region as $obj): ?>
        <li>
            <?= $obj->nome ?>
        </li>
    <?php endforeach; ?>
</ul>