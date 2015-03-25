<?php function loadProducts($arrProducts, $categories)
{

    ?>
    <div id="wrapper">

        <div id="main">
            <div id="content">

                <!-- HIER KOMT HET CATEGORIE MENU-->
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

                </div>
                <!-- categories -->
                <div class="container_store2">
                    <?php
                    foreach ($arrProducts as $productItem) {
                        ?>
                        <div class="item">
                            <div class="image">
                                <img src=<?php echo "../images/" . (rand(1, 5)) . ".jpg"; ?>>
                            </div>
                            <div class="description">
                                <div class="title">
                                    <?php echo $productItem->getName(); ?>
                                </div>
                                <div class="small_description">
                                    <?php echo $productItem->getSmallDescription(); ?>
                                </div>
                            </div>
                            <div class="price">
                                <?php echo "€" . $productItem->getPrice(); ?>
                            </div>
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

?>


