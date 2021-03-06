<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 16:52
 */

function showAdministration($administrations, $size, $link)
{
    ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">
                <div id="login_head">
                    <h1>Beheer</h1>
                </div>
                <div id="breadcrumbs">
                    <a href="../controller/HomeController.php">Home</a><span class="bread_pointer">></span>
                    <a href="../controller/AdminController.php">Beheer</a>
                </div><!-- breadcrumbs -->
                <div id="container_admin">
                        <?php
                        for ($i = 0; $i < $size; $i++) {
                            ?>
                            <div class="order_container">
                                <p>
                                    <?php echo "<p>" . $administrations[$i] . " Beheer </p>"; ?>
                                    <!--<a href="#" class="fill_order_container"></a>-->
                                </p>
                                <a href="<?php echo $link[$i]; ?>" class="fill_order_container"></a>
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

function showProductList($products)
{
    ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">
                <div id="login_head">
                    <h1>Product beheer</h1>
                </div>
                <div id="breadcrumbs">
                    <a href="../controller/HomeController.php">Home</a><span class="bread_pointer">></span>
                    <a href="../controller/AdminController.php">Beheer</a><span class="bread_pointer">></span>
                    <a href="../controller/AdminProductListController.php">Product beheer</a>
                </div><!-- breadcrumbs -->
               <div id="container_admin">
                        <?php
                        foreach ($products as $productItem) {
                            ?>
                            <div class="order_container">
                                <p>
                                    <?php echo $productItem->getName(); ?>
                                    <!--<a href="#" class="fill_order_container"></a>-->
                                    <a class="float_right"
                                       href="AdminDeleteProductController.php?id=<?php echo $productItem->getId(); ?>">Verwijderen</a>
                                </p>
                                <a href="AdminEditProductController.php?id=<?php echo $productItem->getId(); ?>"
                                   class="fill_order_container"></a>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="order_container">
                            <p>
                                Nieuw product toevoegen
                            </p>
                            <a href="AdminAddProductController.php" class="fill_order_container"></a>
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

function showCategoryList($categories)
{
    ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">
                <div id="login_head">
                    <h1>Categorieën beheer</h1>
                </div>
                <div id="breadcrumbs">
                    <a href="../controller/HomeController.php">Home</a><span class="bread_pointer">></span>
                    <a href="../controller/AdminController.php">Beheer</a><span class="bread_pointer">></span>
                    <a href="../controller/AdminCategoryListController.php">Categorie beheer</a>
                </div><!-- breadcrumbs -->
                <div id="container_admin">
                        <?php
                        foreach ($categories as $categoryItem) {
                            ?>
                            <div class="order_container">
                                <p>
                                    <?php echo $categoryItem->getName(); ?>
                                    <!--<a href="#" class="fill_order_container"></a>-->
                                    <a class="float_right"
                                       href="AdminDeleteCategoryController.php?id=<?php echo $categoryItem->getId(); ?>">Verwijderen</a>
                                </p>
                                <a href="AdminEditCategoryController.php?id=<?php echo $categoryItem->getId(); ?>"
                                   class="fill_order_container"></a>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="order_container">
                            <p>
                                Nieuw category toevoegen
                            </p>
                            <a href="AdminAddCategoryController.php" class="fill_order_container"></a>
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

function showOrderList($orders, $user)
{
    ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">

                <div id="login_head">
                    <h1>Order beheer</h1>
                </div>
                <div id="breadcrumbs">
                    <a href="../controller/HomeController.php">Home</a><span class="bread_pointer">></span>
                    <a href="../controller/AdminController.php">Beheer</a><span class="bread_pointer">></span>
                    <a href="../controller/AdminOrderListController.php">Order beheer</a>
                </div><!-- breadcrumbs -->
                <div id="container_admin">
                    <?php
                    foreach ($orders as $orderItem) {
                        ?>
                        <div class="order_container">
                                <?php
                                foreach ($user as $userItem) {
                                    if ($userItem->getId() == $orderItem->getUserId()) {
                                        ?>
                                        <p>
                                            <?php echo "order id: ".$orderItem->getId()." Gebruiker: ".$userItem->getUsername(); ?>
                                            <!--<a href="#" class="fill_order_container"></a>-->
                                            <a class="float_right"
                                               href="AdminDeleteOrderController.php?id=<?php echo $orderItem->getId(); ?>">Verwijderen</a>
                                        </p>
                                        <a href="OrderProductController.php?id=<?php echo $orderItem->getId(); ?>"
                                           class="fill_order_container"></a>
                                        <?php
                                        break;
                                    }
                                }
                                ?>
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