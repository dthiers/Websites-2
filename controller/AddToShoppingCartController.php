<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 11:53
 */


session_start();

// check to see if the cart is empty or not, don't overwrite it if it already exists
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $_GET['id']);

$_SESSION['amount'] += 1;

header("Location: WebshopController.php");
