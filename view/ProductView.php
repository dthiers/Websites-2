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
                <div id="breadcrumbs">
                    <a href="../controller/HomeController.php">Home</a><span class="bread_pointer">></span>
                    <a href="../controller/WebshopController.php">Webshop</a><span class="bread_pointer">></span>
                    <a href="../controller/ProductController.php?id=<?php echo $product->getId(); ?>"><?php echo $product->getName(); ?></a>
                </div><!-- breadcrumbs -->
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
                        <img src=<?php echo "../images/" . (rand(1, 5)) . ".jpg"; ?>>
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
                        <a href="AddToShoppingCartController.php?id=<?php echo $product->getId();?>">
                            Voeg toe aan winkelwagen
                        </a>
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


function addProduct($categories){

    ?>

    <div id="wrapper">
        <div id="main">
            <div id="content">

                <div id="container_register">
                    <div id="form_register_head">
                        <h1>Voeg nieuw product toe</h1>
                    </div><!-- form_register_head -->
                    <div id="form_register">

                        <form class="form-style" method="POST" action="AdminAddProductController.php" enctype="multipart/form-data" onsubmit="return(checkUpload(this));">

                            <ul>
                                <li>
                                    <label for="sku">SKU: </label>
                                    <input type="text" id="sku" name="sku" class="field-style field-split align-right" required/>
                                </li>
                                <li>
                                    <label for="name">Naam: </label>
                                    <input type="text" id="name" name="name" class="field-style field-split align-right" required />
                                </li>
                                <li>
                                    <label for="smallDescription">Korte beschrijving: </label>
                                    <input type="text" id="smallDescription" name="smallDescription" class="field-style field-split align-right" required />
                                </li>
                                <li>
                                    <label for="description">Beschrijving: </label>
                                    <input type="text" id="description" name="description" class="field-style field-split align-right" required/>
                                </li>
                                <li>
                                    <label for="price">Prijs: </label>
                                    <input type="number" step="any" id="price" name="price" class="field-style field-split align-right" required/>
                                </li>
                                <li>
                                    <label for="stock">Voorraad: </label>
                                    <input type="number" id="stock" name="stock" class="field-style field-split align-right" required/>
                                </li>
                                <li>
                                    <label for="image">Afbeelding: </label>
                                    <input type="file" id="image" name="image" accept="image/* class="field-style field-split align-right">
                                </li>
                                <li>
                                    <label for="category">Categorieën: </label>
                                    <select name="category">
                                        <?php
                                            foreach($categories as $category)
                                            {
                                                ?>
                                                <option value="<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </li>
                                <li>
                                    <input type="submit" value="Toevoegen" class="align-right"/>
                                </li>

                            </ul>
                        </form>
                    </div><!-- form_register -->
                </div>
                <!-- container_store2 -->

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

function editProduct($categories, $product){

    ?>

    <div id="wrapper">
        <div id="main">
            <div id="content">

                <div id="container_register">
                    <div id="form_register_head">
                        <h1>Wijzig Product</h1>
                    </div><!-- form_register_head -->
                    <div id="form_register">

                        <form class="form-style" method="POST" action="AdminEditProductController.php" enctype="multipart/form-data">

                            <ul>
                                <li>
                                    <input type="hidden" name="id" value="<?php echo $product->getId(); ?>">
                                </li>
                                <li>
                                    <label for="sku">SKU: </label>
                                    <input type="text" id="sku" name="sku" class="field-style field-split align-right"
                                           value="<?php echo $product->getSKU();?>" required/>
                                </li>
                                <li>
                                    <label for="name">Naam: </label>
                                    <input type="text" id="name" name="name" class="field-style field-split align-right"
                                           value ="<?php echo $product->getName(); ?>"required />
                                </li>
                                <li>
                                    <label for="smallDescription">Korte beschrijving: </label>
                                    <input type="text" id="smallDescription" name="smallDescription" class="field-style field-split align-right"
                                           value="<?php echo $product->getSmallDescription(); ?>" required />
                                </li>
                                <li>
                                    <label for="description">Beschrijving: </label>
                                    <input type="text" id="description" name="description" class="field-style field-split align-right"
                                           value="<?php echo $product->getDescription(); ?>"required/>
                                </li>
                                <li>
                                    <label for="price">Prijs: </label>
                                    <input type="number" step="any" id="price" name="price" class="field-style field-split align-right"
                                           value="<?php echo $product->getPrice(); ?>" required/>
                                </li>
                                <li>
                                    <label for="stock">Voorraad: </label>
                                    <input type="number" id="stock" name="stock" class="field-style field-split align-right"
                                           value="<?php echo $product->getStock(); ?>" required/>
                                </li>
                                <li>
                                    <label for="image">Afbeelding: </label>
                                    <input type="file" id="image" name="image" accept="image/* class="field-style field-split align-right">
                                </li>
                                <li>
                                    <label for="category">Categorieën: </label>
                                    <select name="category">
                                        <?php
                                        foreach($categories as $category)
                                        {
                                            ?>
                                            <option value="<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></option>
                                        <?php
                                        }
                                        ?>
                                        <option value="0" selected="selected">...</option>
                                    </select>
                                </li>
                                <li>
                                    <input type="submit" value="Aanpassen" class="align-right"/>
                                </li>

                            </ul>
                        </form>
                    </div><!-- form_register -->
                </div>
                <!-- container_store2 -->

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