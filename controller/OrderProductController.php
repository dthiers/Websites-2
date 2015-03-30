<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 16:31
 */

include '../model/Database.class.php';
include '../model/Product.class.php';
include '../view/WebshopView.php';
include '../view/headerView.php';
include '../model/Navigation.class.php';
include '../view/footerView.php';

$db = Database::getDatabase();
$products = Product::getProductsFromOrder($_GET['id']);

loadHeader();
showProductsOrder($products);
loadFooter();