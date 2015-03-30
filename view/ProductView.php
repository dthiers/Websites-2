<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 25/03/15
 * Time: 17:16
 */

function showProductDetails($categories, $product)
{
    ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">
                <div id="login_head">
                    <h1><?php echo $product->getName(); ?></h1>
                </div>
                <!-- CATEGORY MENU -->
                <div id="categories">
                    <h1>Categories</h1>
                    <p>
                    <ul>
                        <?php
                        $counter = 0;
                        foreach ($categories as $categoryItem) {
                            if ($categoryItem->getParent() == 0) { ?>
                                <input id="<?php echo "input" . $counter; ?>" type="checkbox" class="main_category">
                                <li>
                                <a class="main" href="CategoryProductsController.php?id=<?php echo $categoryItem->getId(); ?>"><?php echo $categoryItem->getName(); ?></a>
                                <label for="<?php echo "input" . $counter; ?>"><?php //echo $categoryItem->getName(); ?>
                                    ></label>
                            <?php
                            } ?>
                            <ul>
                                <?php
                                foreach ($categories as $item) {
                                    if ($categoryItem->getId() == $item->getParent()) {
                                        ?>
                                        <li><a href="CategoryProductsController.php?id=<?php echo $item->getId(); ?>"><?php echo $item->getName(); ?></a></li>
                                    <?php
                                    }
                                }?>
                            </ul></li>
                            <?php
                            $counter++;
                        }
                        ?>
                    </ul>
                    </p>
                </div><!-- categories -->

                <div class="container_store2">

                    <div id="basic_info">
                        <table id="productinfo">
                            <tr>
                                <td class="left_label">SKU</td>
                                <td class="right_label"><?php echo $product->getSKU(); ?></td>
                            </tr>
                            <tr>
                                <td class="left_label">Beschrijving</td>
                                <td class="right_label"><?php echo $product->getSmallDescription(); ?></td>
                            </tr>
                        </table>
                    </div><!-- basic_info -->

                    <div id="product_img">
                        <p><?php echo $product->getImg(); ?></p>
                    </div><!-- product_img -->
                    <div class="clearer"></div><!-- clearer -->

                    <div id="product_description">
                        <h1>Beschrijving:</h1>
                        <p><?php echo $product->getDescription(); ?></p>
                    </div><!-- product_description -->

                    <div id="product_details">
                        <div id="product_price">
                            <?php echo '$'.$product->getPrice(); ?>
                        </div><!-- product_price -->
                        <div id="product_stock">
                            <?php echo $product->getStock().' in stock'; ?>
                        </div><!-- product_stock -->
                    </div><!-- product_details -->
                    <div class="clearer"></div><!-- clearer -->
                    <div id="product_details">
                        <form action="../controller/AddToShoppingCartController.php?id=<?php echo $product->getId();?>">
                            <input type="submit" value="Voeg toe aan winkelwagen" />
                        </form>
                    </div><!-- product_details -->

                </div><!-- container_store2 -->

            </div><!-- content -->
            <div class="clearer"></div><!-- clearer -->


        </div><!-- main -->
        <div class="clearer"></div><!-- clearer -->
        <div class="push"></div><!-- push -->
    </div><!-- wrapper -->


<?php
}
?>