<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 12:13
 */

function showShoppingcart($products)
{
    $totaalPrijs = 0;
    $productSessionId = 0;
    ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">
                <div class="cart_head">
                    <h1>Winkelwagen</h1>
                </div><!-- cart_head -->
                <div id="breadcrumbs">
                    <a href="../controller/HomeController.php">Home</a><span class="bread_pointer">></span>
                    <a href="../controller/ShoppingCartController.php">Winkelwagen</a>
                </div><!-- breadcrumbs -->
                <div class="cart_head">
                    <p>

                        <?php
                        if (empty($_SESSION['amount'])){
                            echo "Beste klant, u heeft geen producten in de winkelwagen";
                        }
                        else {
                            echo "Beste klant, u heeft ";
                            if ($_SESSION['amount'] < 1) {
                                echo ' 0 producten in de winkelwagen';
                            } else if ($_SESSION['amount'] == 1) {
                                echo ' 1 product in de winkelwagen';
                            } else {
                                echo $_SESSION['amount'] . ' producten in de winkelwagen';
                            }
                        }
                        ?>
                    </p>
                </div><!-- cart_head -->

                <div id="shopping_cart">
                    <?php foreach($products as $productItem)
                    {
                        $totaalPrijs += $productItem->getPrice();
                        ?>
                        <div class="shopping_cart_item">
                            <div class="clearer"></div>
                            <div class="shopping_cart_item_cross">
                                <a href="DeleteProductFromShoppingCartController.php?id=<?php echo $productItem->getId(); ?>">
                                    <img src="../images/cross.png" alt=" " />
                                </a>
                            </div>
                            <div class="shopping_cart_item_img">
                                <a  href="ProductController.php?id=<?php echo $productItem->getId(); ?>">

                                </a>
                                <img src="./<?php echo $productItem->getImg(); ?>" alt=" "/>
                            </div>
                            <div class="shopping_cart_item_title">
                                <?php echo $productItem->getName(); ?>
                            </div>
                            <div class="shopping_cart_item_price">
                                <?php echo '€'.number_format((float)$productItem->getPrice(), 2, ',', ''); ?>
                            </div>

                        </div><!-- shopping_cart_item -->
                    <?php
                    }
                    ?>

                </div><!-- shopping_cart -->
                <div class="clearer"></div><!-- clearer -->

                <div class="cart_head">
                    <div id="check_out_price">
                        <div id="product_price">
                            <?php echo '€'.number_format((float)$totaalPrijs, 2, ',', ''); ?>
                        </div>
                        <div id="product_stock">
                            Totaal:
                        </div>
                    </div><!-- check_out_price -->
                </div><!-- cart_head -->

                <div class="clearer"></div><!-- clearer -->

                <div id="check_out_button">
                    <a href="AddToOrderController.php">
                        Bestelling plaatsen
                    </a>
                </div>
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

?>