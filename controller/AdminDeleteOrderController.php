<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 31-3-2015
 * Time: 17:55
 */

if(!isset($_SESSION)){
    session_start();
}

include '../model/Database.class.php';
include '../view/AdminView.php';
include '../view/HeaderView.php';
include '../model/Navigation.class.php';
include '../view/FooterView.php';

$db = Database::getDatabase();
$id = $_GET['id'];
$delete = $db->deleteOrder($id);

header("Location: AdminOrderListController.php");