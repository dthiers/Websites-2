<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 31-3-2015
 * Time: 17:34
 */

if(!isset($_SESSION)){
    session_start();
}

include '../model/Database.class.php';
include '../view/AdminView.php';
include '../view/HeaderView.php';
include '../model/Navigation.class.php';
include '../view/FooterView.php';
include '../model/Order.class.php';
include '../model/User.class.php';

$orders = Order::getAllOrdersAdmin();
$user = array();

foreach ($orders as $order) {
    $user[] = User::getUserById(($order->getUserId()));
}

loadHeader();
showOrderList($orders, $user);
loadFooter();