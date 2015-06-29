<?php

require './bootstrap.php';

use POS\Model\Entity\Category;
use POS\Model\Entity\CategoryFactory;

$categories = [
    'Breakfast',
    'Soup',
    'Wraps',
    'Sandwiches',
    'Salads',
    'Deserts',
    'Beverages',
];

foreach ($categories as $category) {
    $prototype = new Category();

    $factory = new CategoryFactory();

    $factory->setEntityManager($entityManager);

    $factory->setPrototype($prototype);

    $arr = [
        'name' => $category
    ];

    $factory->fromArray($arr);

    $created = $factory->create();

    echo $created->getName() . '<br>';
}
