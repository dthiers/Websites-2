<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 12:04
 */

include '../model/Database.class.php';
include '../model/Product.class.php';
include '../view/ShoppingCartView.php';

include '../view/HeaderView.php';
include '../model/Navigation.class.php';
include '../model/Category.class.php';
include '../view/FooterView.php';

if(!isset($_SESSION)){
    session_start();
}

$products = array();

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cartItem) {
        $product = Product::getProduct($cartItem);
        $products[] = $product;
    }

}
loadHeader();
showShoppingcart($products);
loadFooter();
