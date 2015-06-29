<?php

require './bootstrap.php';

use POS\Model\Entity\Table;
use POS\Model\Entity\TableFactory;

$i = 1;

while ($i <= 50) {
    $prototype = new Table();

    $factory = new TableFactory();

    $factory->setEntityManager($entityManager);

    $factory->setPrototype($prototype);

    $arr = [
        'name' => 'B' . $i
    ];

    $factory->fromArray($arr);

    $table = $factory->create();

    echo $table->getName() . '<br>';

    $i++;
}
