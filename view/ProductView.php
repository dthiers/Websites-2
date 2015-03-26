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
                                    <a class="main" href="#"><?php echo $categoryItem->getName(); ?></a>
                                    <label for="<?php echo "input" . $counter; ?>"><?php //echo $categoryItem->getName(); ?>
                                        ></label>
                                <?php
                                } ?>
                                <ul>
                                    <?php
                                    foreach ($categories as $item) {
                                        if ($categoryItem->getId() == $item->getParent()) {
                                            ?>
                                            <li><a href="#"><?php echo $item->getName(); ?></a></li>
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
                        <?php
                        // get all info from product
                        echo 'id = '.$product->getId().'<br>';
                        echo 'sku = '.$product->getSKU().'<br>';
                        echo 'name = '.$product->getName().'<br>';
                        echo 'small description = '.$product->getSmallDescription().'<br>';
                        echo 'description = '.$product->getDescription().'<br>';
                        echo 'price = '.$product->getPrice().'<br>';
                        echo 'stock = '.$product->getStock().'<br>';
                        ?>
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