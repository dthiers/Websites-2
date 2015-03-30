<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 12:48
 */



include '../model/Database.class.php';
include '../model/Order.class.php';

include '../view/headerView.php';
include '../model/Navigation.class.php';
include '../view/footerView.php';

$user = User::getUser($username);

$order = Order::CreateOrder($user->getId(), 1, )

