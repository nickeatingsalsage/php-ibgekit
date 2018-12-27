<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // change the path to your own autoload

$search = new \IbgeKit\src\kits\locations\StateSearch();
$states = $search->getAll();

?>

<p>
    <?= "Estados:" . count($states) ?>
</p>
<ul>
    <?php foreach ($states as $state): ?>
        <li>
            <?= $state->nome ?>
        </li>
    <?php endforeach; ?>
</ul>
