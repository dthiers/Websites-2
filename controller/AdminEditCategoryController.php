<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 31-3-2015
 * Time: 14:58
 */

include '../model/Database.class.php';
include '../model/Navigation.class.php';
include '../model/Category.class.php';

include '../view/HeaderView.php';
include '../view/CategoryView.php';
include '../view/FooterView.php';

if (!empty($_POST)) {

    $oldCategory = Category::getCategory($_POST['id']);
    $name = $_POST['categoryName'];
    $parent = $oldCategory->getParent();
    if (!empty($_POST['categoryParent'])) {
        $parent = $_POST['categoryParent'];
    }

    $category = new Category($_POST['id'], $name, $parent);
    $db = Database::getDatabase();
    $db->editCategory($category);

    header("Location: ../controller/AdminCategoryListController.php");
}

$category = Category::getCategory($_GET['id']);
$categories = Category::getCategories();

loadHeader();
editCategory($categories, $category);
loadFooter();
