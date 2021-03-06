<?php

$items = [
    'Breakfast' => [
        'Toasted Bagel Jam' => 1.50,
        'Toasted Bagel Cheese' => 2.25,
        'Cold Cereal With Toast' => 3.49,
        'Toast and Jam' => 1.50,
        'Egg, Bacon Cheese' => 3.99,
        'Bacon and Cheese' => 3.49,
        'Bacon and Tomato' => 3.49,
    ],
    'Soup' => [
        'Soup and Crackers' => 2.99,
        'Soup and Toasted bagel' => 3.99,
        'Salad with Soup' => 4.99,
    ],
    'Wraps' => [
        'Chicken Garden Wrap' => 5.25,
        'Chicken Caesar Wrap' => 5.75,
        'Mexican Wrap' => 5.99,
        'Chicken Greek Wrap' => 6.99,
        'Canadian Wrap' => 6.99,
        'Vegetarian Wrap' => 4.75,
    ],
    'Sandwiches' => [
        'Grandma G\'s' => 4.99,
        'Montreal Smoked Meat' => 4.99,
        'Turkey' => 4.99,
        'Toasted Western' => 3.99,
        'Grilled Swiss' => 4.99,
    ],
    'Salads' => [
        'Garden' => 4.25,
        'Chicken Garden' => 6.25,
        'Caesar' => 4.99,
        'Greek Salad' => 5.50,
        'Chicken Caesar' => 6.25,
        'Pasta Salad' => 4.25,
    ],
    'Deserts' => [
        'Muffins' => 1.25,
        'Cinnamon Rolls' => 1.10,
        'Butter Tarts' => 1.00,
        'Tea Biscuits' => 1.50,
        'Fruit Danish' => 1.50,
        'Cookies' => 1.00,
        'Rice Pudding' => 2.25,
        'Caramel Sundae' => 2.99,
        'Chocolate Sundae' => 2.99,
    ],
    'Beverages' => [
        'Coffee' => 1.45,
        'Tea' => 1.17,
        'Herbal Tea' => 1.25,
        'Soft Drink' => 1.00,
        'Juice' => 1.75,
        'Iced Tea' => 1.75,
        'Large Drinks' => 2.25,
        'Milk' => 1.50,
    ],
];

require './bootstrap.php';

use POS\Model\Entity\Item;
use POS\Model\Entity\ItemFactory;

foreach ($items as $category => $item_collection) {
    foreach ($item_collection as $name => $price) {
        $arr = [
            'category' => $category,
            'name' => $name,
            'price' => $price,
        ];

        $prototype = new Item();

        $factory = new ItemFactory();

        $factory->setEntityManager($entityManager);

        $factory->setPrototype($prototype);

        $factory->fromArray($arr);

        $created = $factory->create();

        echo $created->getName() . '<br>';
    }
}
