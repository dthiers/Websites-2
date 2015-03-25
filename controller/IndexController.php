<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 11/03/15
 * Time: 16:19
 */

include '../model/Database.class.php';
include '../model/Product.class.php';
include '../view/index.php';
include '../view/headerView.php';
include '../view/footerView.php';

$allProducts = Product::getAllProductsFromCategory(1);
loadHeader();
loadProducts($allProducts);
loadFooter();