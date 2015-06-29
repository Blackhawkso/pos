<?php

require './bootstrap.php';

$tables = $entityManager->getRepository('\POS\Model\Entity\Table')->findAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tables</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1>Tables</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php
            /**
             * @var \POS\Model\Entity\TableInterface $table
             */
            foreach ($tables as $table) {

                $last_order = $table->getLastOrder();

                if ($last_order) {
                    if ($last_order->isOpen()) {
                        $class = 'btn-success';
                    } elseif ($last_order->isLocked()) {
                        $class = 'btn-danger';
                    } else {
                        $class = 'btn-default';
                    }
                } else {
                    $class = 'btn-default';
                }
                ?>
                <!--<div class="col-lg-1">-->
                <a href="./order.php?cover=<?php print $table->getId(); ?>" class="col-lg-1 col-md-2 col-sm-4 col-xs-12 btn btn-lg <?php print $class; ?>">
                    <?php echo $table->getName(); ?>
                </a>
                <!--</div>-->
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
