<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 31-3-2015
 * Time: 14:27
 */
include '../model/Database.class.php';
include '../model/Navigation.class.php';
include '../model/Category.class.php';

include '../view/HeaderView.php';
include '../view/CategoryView.php';
include '../view/FooterView.php';

if (!empty($_POST)) {

    $name = $_POST['categoryName'];
    $parent = null;
    if (!empty($_POST['categoryParent'])) {
        $parent = $_POST['categoryParent'];
    }

    $category = new Category(null, $name, $parent);
    $db = Database::getDatabase();
    $db->createCategory($category);

    header("Location: ../controller/AdminCategoryListController.php");
}

$categories = Category::getCategories();

loadHeader();
createCategory($categories);
loadFooter();