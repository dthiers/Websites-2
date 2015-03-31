<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 14:22
 */

function showOrders($orders)
{
    ?>

    <div id="wrapper">
        <div id="main">
            <div id="content">

                <div id="login_head">
                    <h1>Mijn orders</h1>
                </div>
                <div id="breadcrumbs">
                    <a href="../controller/HomeController.php">Home</a><span class="bread_pointer">></span>
                    <a href="../controller/OrderController.php">Orders</a>
                </div><!-- breadcrumbs -->

                <div id="container_admin">
                <?php
                foreach ($orders as $orderItem) {
                    ?>
                    <div class="order_container">
                            <?php echo "<p>Order id: " . $orderItem->getId() . "</p>"; ?>
                            <?php echo "<p>" . $orderItem->getAddress() . " " . $orderItem->getZip() . "</p>"; ?>
                            <?php echo "<p>" . $orderItem->getCity() . " " . $orderItem->getCountry() . "</p>"; ?>
                            <a href="OrderProductController.php?id=<?php echo $orderItem->getId(); ?>" class="fill_order_container"></a>
                    </div>
                <?php
                }
                ?>
                </div><!-- container_admin -->

            </div>
            <!-- content -->
            <div class="clearer"></div>
            <!-- clearer -->

        </div>
        <!-- main -->
        <div class="clearer"></div>
        <!-- clearer -->
        <div class="push"></div>
        <!-- push -->
    </div><!-- wrapper -->
<?php
}

?>