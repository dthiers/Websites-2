<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 14:00
 */

session_start();

include '../model/Database.class.php';
include '../model/Product.class.php';
include '../model/Order.class.php';
//include '../view/WebshopView.php';
include '../view/headerView.php';
include '../model/Navigation.class.php';
include '../view/footerView.php';

$db = Database::getDatabase();
$user = User::getUser($_SESSION['username']);

$orders = Order::getAllOrders($user->getId());

loadHeader();
showOrders($orders);
loadFooter();