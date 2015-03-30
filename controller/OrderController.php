<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 14:00
 */

session_start();
unset($_SESSION['cart']);

include '../model/Database.class.php';
include '../model/Product.class.php';
include '../model/Order.class.php';
include '../model/User.class.php';
//include '../view/WebshopView.php';
include '../view/HeaderView.php';
include '../view/OrdersView.php';
include '../model/Navigation.class.php';
include '../view/FooterView.php';

$db = Database::getDatabase();
$user = User::getUser($_SESSION['username']);

$orders = Order::getAllOrders($user->getId());

loadHeader();
showOrders($orders);
loadFooter();