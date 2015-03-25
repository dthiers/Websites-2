<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 25/03/15
 * Time: 17:14
 */
include '../model/Database.class.php';
include '../model/Product.class.php';
include '../view/ProductView.php';

include '../view/headerView.php';
include '../model/Navigation.class.php';
include '../model/Category.class.php';
include '../view/footerView.php';

//$product = Product::getProduct($id); // Die ID moet hier meekomen vanaf de webshop, geen idee hoe?

loadHeader();
showProductDetails(); // hier geef je $product mee, nu voor testen even niet.
loadFooter();
