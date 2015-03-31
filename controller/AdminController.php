<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 16:53
 */

if(!isset($_SESSION)){
    session_start();
}

include '../model/Database.class.php';
include '../view/AdminView.php';
include '../view/HeaderView.php';
include '../model/Navigation.class.php';
include '../view/FooterView.php';

$administration = array();
$link = array();
array_push($administration, "Producten", "Categorieën", "Orders");
array_push($link, "AdminProductListController.php", "AdminCategoryListController.php", "AdminOrderListController.php");
$size = count($administration);

loadHeader();
showAdministration($administration, $size, $link);
loadFooter();