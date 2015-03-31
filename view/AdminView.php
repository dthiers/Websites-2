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

                <div id="container_home">
                    <div id="content_home">
                        <h1>Beheer</h1>
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

function showProductList($products)
{
    ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">

                <div id="container_home">
                    <div id="content_home">
                        <h1>Beheer Producten</h1>
                        <?php
                        foreach($products as $productItem) {
                            ?>
                            <div class="order_container">
                                <p>
                                    <?php echo $productItem->getName(); ?>
                                    <!--<a href="#" class="fill_order_container"></a>-->
                                    <a id="float_right" href="AdminDeleteProductController.php?id=<?php echo $productItem->getId(); ?>">Verwijderen</a>
                                </p>
                                <a href="AdminEditProductController.php?id=<?php echo $productItem->getId(); ?>" class="fill_order_container"></a>
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

function showCategoryList($categories)
{
    ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">

                <div id="container_home">
                    <div id="content_home">
                        <h1>Beheer Categorieën</h1>
                        <?php
                        foreach ($categories as $categoryItem) {
                            ?>
                            <div class="order_container">
                                <p>
                                    <?php echo $categoryItem->getName(); ?>
                                    <!--<a href="#" class="fill_order_container"></a>-->
                                    <a id="float_right"
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