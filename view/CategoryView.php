<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 31-3-2015
 * Time: 14:02
 */

function createCategory($categories) {
    ?>

    <div id="wrapper">
        <div id="main">
            <div id="content">

                <div id="container_register">
                    <div id="form_register_head">
                        <h1>Voeg nieuw categorie toe</h1>
                    </div><!-- form_register_head -->
                    <div id="form_register">

                        <form class="form-style" method="POST" action="AdminAddCategoryController.php">
                            <ul>
                                <li>
                                    <label for="categoryNaam">Naam: </label>
                                    <input type="text" id="categoryNaam" name="categoryName" class="field-style field-split align-right" required/>
                                </li>
                                <li>
                                    <label for="category">Vorige Categorie: </label>
                                    <select name="categoryParent">
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

function editCategory($categories, $category) {
    ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">

                <div id="container_register">
                    <div id="form_register_head">
                        <h1>Categorie aanpassen</h1>
                    </div><!-- form_register_head -->
                    <div id="form_register">

                        <form class="form-style" method="POST" action="AdminEditCategoryController.php">
                            <ul>
                                <li>
                                    <input type="hidden" name="id" value="<?php echo $category->getId(); ?>"
                                </li>
                                <li>
                                    <label for="categoryName">Naam: </label>
                                    <input type="text" id="categoryName" name="categoryName" value="<?php echo $category->getName(); ?>" class="field-style field-split align-right" required/>
                                </li>
                                <li>
                                    <label for="category">Vorige Categorie: </label>
                                    <select name="categoryParent">
                                        <?php
                                        foreach($categories as $categoryItem)
                                        {
                                            ?>
                                            <option value="<?php echo $categoryItem->getId(); ?>"><?php echo $categoryItem->getName(); ?></option>
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