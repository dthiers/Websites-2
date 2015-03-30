<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 16:53
 */

include '../model/Database.class.php';
include '../view/AdminView.php';
include '../view/headerView.php';
include '../model/Navigation.class.php';
include '../view/footerView.php';

$administration = array();
array_push($administration, "Producten", "Categorieën", "Orders");

$size = count($administration);

loadHeader();
showAdministration($administration, $size);
loadFooter();