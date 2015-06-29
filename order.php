<?php

@$table_id = $_GET['cover'];
@$category_id = $_GET['cat'];

require './bootstrap.php';

/** @var \POS\Model\Entity\TableInterface $table */
$table = $entityManager->find('\POS\Model\Entity\Table', $table_id);

$last_order = $table->getLastOrder();

if ($last_order) {
    if (!$last_order->isClosed()) {
        $status = $last_order->getStateLabel();
    } else {
        $status = 'New';
        $last_order = null;
    }
} else {
    $status = 'New';
    $last_order = null;
}

/** @var \Doctrine\Common\Collections\Collection $categories */
$categories = $entityManager->getRepository('\POS\Model\Entity\Category')->findAll();

if (isset($category_id)) {
    /** @var \POS\Model\Entity\CategoryInterface $category */
    $category = $entityManager->find('\POS\Model\Entity\Category', $category_id);

    /** @var \Doctrine\Common\Collections\Collection $items */
    $items = $category->getItems();
} else {
    /** @var \POS\Model\Entity\CategoryInterface $category */
    $category = $categories[0];

    /** @var \Doctrine\Common\Collections\Collection $items */
    $items = $category->getItems();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Order</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
<div class="container-fluid" style="height: 100%;">
    <div class="row" style="height: 100%;">
        <div class="col-lg-1">
            <a href="#" class="btn btn-default btn-lg btn-block">
                Print Bill
            </a>
        </div>
        <div class="col-lg-5" style="height: 98%;">
            <div class="list-group" style="overflow: auto;">
                <div class="list-group-item">
                    <h4 class="list-group-item-heading">Table: <?php echo $table->getName(); ?></h4>

                    <p class="list-group-item-text">Status: <?php echo $status; ?></p>
                </div>

                <?php
                if (!is_null($last_order)) {

                    $total = 0;

                    $order_items = $entityManager->getRepository('\POS\Model\Entity\Order\OrderItem')
                        ->findBy(
                            [
                                'order' => $last_order
                            ]
                        );

                    /** @var \POS\Model\Entity\Order\OrderItemInterface $item */
                    foreach ($order_items as $item) {
                        ?>
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading"><?php echo $item->getQty(); ?>
                                &nbsp;<?php echo $item->getItem()->getName(); ?> <span
                                    class="pull-right"><?php echo number_format($item->getTotal(), 2); ?></span></h4>
                        </div>
                    <?php
                        $total += $item->getTotal();
                    }
                    ?>
                    <div class="list-group-item">
                        <h4 class="list-group-item-header">
                            Total <span class="pull-right"><?php echo number_format($total, 2); ?></span>
                        </h4>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
        <div class="col-lg-1">
            <?php
            /** @var \POS\Model\Entity\CategoryInterface $group */
            foreach ($categories as $group) {
                ?>
                <a href="./order.php?cover=<?php print $table_id; ?>&cat=<?php print $group->getId(); ?>"
                   class="btn btn-lg btn-warning btn-block">
                    <?php echo $group->getName(); ?>
                </a>
            <?php
            }
            ?>
        </div>
        <div class="col-lg-5">
            <?php
            /** @var \POS\Model\Entity\ItemInterface $item */
            foreach ($items as $item) {
                ?>
                <a href="./add_item.php?cover=<?php print $table_id; ?>&item=<?php print $item->getId();
                if (!is_null($last_order)) {
                    print '&id=' . $last_order->getId();
                } ?>" class="btn btn-lg btn-success col-lg-4">
                    <?php echo $item->getName(); ?>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
