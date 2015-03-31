<?php function loadProducts($arrProducts, $categories)
{

    ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">
                <div id="webshop_head">
                    <h1>Webshop</h1>
                    <form method="GET" action="SearchController.php" class="no_style">
                        <input type="search" name="search" placeholder="Zoeken">
                    </form>

                </div>
                <div class="clearer"></div>
                <div id="breadcrumbs">
                    <a href="../controller/HomeController.php">Home</a><span class="bread_pointer">></span>
                    <a href="../controller/WebshopController.php">Webshop</a>
                </div><!-- breadcrumbs -->
                <!-- login_head -->

                <!-- HIER KOMT HET CATEGORIE MENU-->
                <div id="categories">
                    <h1>Categories</h1>

                    <ul>
                        <?php
                        $counter = 0;
                        foreach ($categories as $categoryItem) {
                            if ($categoryItem->getParent() == 0) { ?>
                                <li>
                                    <a class="main" href="CategoryProductsController.php?id=<?php echo $categoryItem->getId(); ?>"><?php echo $categoryItem->getName(); ?></a>

                                        <ul>
                                            <?php
                                            foreach ($categories as $item) {
                                                if ($categoryItem->getId() == $item->getParent()) {
                                                    ?>
                                                    <li>
                                                        <a href="CategoryProductsController.php?id=<?php echo $item->getId(); ?>"><?php echo $item->getName(); ?></a>
                                                    </li>
                                                <?php
                                                }
                                            } ?>
                                        </ul>
                                </li>
                            <?php

                            }
                            $counter++;
                        }
                        ?>
                    </ul>


                </div>
                <!-- categories -->
                <div class="container_store2">
                    <?php
                    foreach ($arrProducts as $productItem) {
                        ?>
                        <div class="item">
                            <div class="image">
                                    <img src="./<?php echo $productItem->getImg(); ?>" alt=" "/>
                            </div>
                            <div class="description">
                                <div class="title">
                                    <a href="../controller/ProductController.php?id=<?php echo $productItem->getId(); ?>"><?php echo $productItem->getName(); ?></a>
                                </div>
                                <div class="small_description">
                                    <?php echo $productItem->getSmallDescription(); ?>
                                </div>
                            </div>
                            <div class="price">
                                <?php echo "€" . number_format((float)$productItem->getPrice(), 2, ',', ''); ?>
                            </div>
                            <?php
                            if ($productItem->getStock() <= 0) {
                                ?>
                                <div class="cart_img">
                                    <p>Out of stock</p>
                                </div>
                            <?php
                            } else {
                                ?>
                                <div class="cart">
                                    <div class="cart_img">
                                        <a href="AddToShoppingCartController.php?id=<?php echo $productItem->getId(); ?>"><img src="../images/cart_small25.png" alt="cart" /></a>
                                    </div>
                                    <!-- cart_img -->
                                </div><!-- cart -->
                            <?php
                            }
                            ?>
                            <div class="clearer"></div>
                        </div><!-- .item -->
                    <?php
                    }
                    ?>
                </div>
                <!-- container store -->
            </div>
            <div class="clearer"></div>
            <!-- content -->
        </div>
        <!-- #main -->
        <div class="clearer"></div>

        <div class="push"></div>

    </div><!-- /#wrapper -->
<?php
}


function showProductsOrder($products)
{
    $totaalPrijs = 0;
    ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">

                <div id="login_head">
                    <h1>Producten in order</h1>
                </div>
                <div id="breadcrumbs">
                    <a href="../controller/HomeController.php">Home</a><span class="bread_pointer">></span>
                    <a href="../controller/OrderController.php">Orders</a><span class="bread_pointer">></span>
                    <a href="#">Order</a>
                </div><!-- breadcrumbs -->
                    <div id="container_admin">
                    <?php
                    foreach ($products as $productItem) {
                        ?>
                        <div class="order_container">
                            <p>
                                <?php echo "<p>" . $productItem->getName() . "</p>"; ?>
                                <?php echo "<p>" . $productItem->getSmallDescription() . " €" . $productItem->getPrice() . "</p>"; ?>
                                <?php $totaalPrijs += $productItem->getPrice(); ?>
                                <a href="ProductController.php?id=<?php echo $productItem->getId(); ?>" class="fill_order_container"></a>
                            </p>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="order_container">
                        <p>
                            Totaalprijs: €<?php echo $totaalPrijs; ?>
                            <!--<a href="#" class="fill_order_container"></a>-->
                        </p>
                    </div>
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


