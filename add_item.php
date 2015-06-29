<?php

require './bootstrap.php';

use POS\Model\Entity\Order;
use POS\Model\Entity\OrderFactory;
use POS\Model\Entity\Order\OrderItem;

$prototype = new Order();

$factory = new OrderFactory();

if (isset($_GET['id'])) {
    $order = $entityManager->find('\POS\Model\Entity\Order', $_GET['id']);

    $factory->setInstance($order);
}

$factory->setEntityManager($entityManager);

$factory->setPrototype($prototype);

$factory->fromArray($_GET);

$order = $factory->create();

$item = $entityManager->find('\POS\Model\Entity\Item', $_GET['item']);

$order_item = $entityManager->getRepository('\POS\Model\Entity\Order\OrderItem')
    ->findOneBy(
        [
            'order' => $order,
            'item' => $item
        ]
    );

if (!is_null($order_item)) {
    $order_item->setQty($order_item->getQty() + 1);

    $entityManager->persist($order_item);
    $entityManager->flush();

    header('Location: ./order.php?cover=' . $_GET['cover']);
} else {
    $order_item = new OrderItem();

    $order_item->setItem($item)
        ->setOrder($order)
        ->setQty(1);

    $entityManager->persist($order_item);
    $entityManager->flush();

    header('Location: ./order.php?cover=' . $_GET['cover']);
}
