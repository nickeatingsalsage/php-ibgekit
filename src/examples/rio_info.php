<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // change the path to your own autoload

$search = new \IbgeKit\src\kits\locations\StateSearch();
$state = $search->getOne(33);

?>
<p>
    <?= "ESTADO: {$state->nome}" ?>
</p>
<p>
    <?= "Região: {$state->getRegion()->nome}" ?>
</p>
<p>
    <?= "Municipios:" . count($state->getAllCounties()) ?>
</p>
<ul>
    <?php foreach ($state->getAllCounties() as $county): ?>
        <li>
            <?= $county->nome ?>
        </li>
    <?php endforeach; ?>
</ul>
