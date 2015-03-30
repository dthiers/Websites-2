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

                <div id="container_home">
                    <div id="content_home">
                        <h1>Orders</h1>
                        <?php
                        foreach ($orders as $orderItem) {
                            ?>
                            <div class="order_container">

                                <p>
                                    <?php echo "<p>Order id: " . $orderItem->getId() . "</p>"; ?>
                                    <?php echo "<p>" . $orderItem->getAddress() . " " . $orderItem->getZip() . "</p>"; ?>
                                    <?php echo "<p>" . $orderItem->getCity() . " " . $orderItem->getCountry() . "</p>"; ?>
                                    <a href="#" class="fill_order_container"></a>
                                </p>

                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- content_home -->
                </div>
                <!-- container_home -->

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