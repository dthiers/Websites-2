<?php function loadProducts($arrProducts)
{ ?>
    /*var_dump($arrProducts);

    foreach ($arrProducts as $product){
    echo $product->getName();
    }



    */


    <div id="wrapper">

        <div id="main">
            <div id="content">

                <!-- HIER KOMT HET CATEGORIE MENU-->
                <div id="categories">
                    <h1>Categories</h1>

                    <p>
                    <ul>
                        <?php
                        for ($u = 0; $u < 10; $u++) {
                            ?>
                            <li><a href="#">Category <?php echo $u + 1;?></a></li>
                        <?php
                        }
                        ?>
                        <li>
                            <ul>
                                <?php
                                for ($u = 0; $u < 10; $u++) {
                                    ?>
                                    <li><a href="#">Category <?php echo $u + 1;?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                    </p>

                </div>
                <!-- categories -->
                <div class="container_store2">
                    <?php
                    for ($i = 0; $i < 20; $i++) {
                        ?>
                        <div class="item">
                            <div class="image">
                                <img src=<?php echo "../images/" . (rand(1, 5)) . ".jpg"; ?>>
                            </div>
                            <div class="title">
                                Dit is een test titel nummer <?php echo $i + 1 ?>
                            </div>
                            <div class="price">
                                prijs: <?php echo(rand(0.1, 1000)); ?>
                            </div>
                        </div><!-- .item -->
                    <?php
                    }
                    ?>
                </div>
                <!-- container store -->
            </div>
            <!-- content -->
        </div>
        <!-- #main -->
        <div class="clearer"></div>
    </div><!-- /#wrapper -->
<?php
}

?>


