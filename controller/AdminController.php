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
array_push($administration, "Producten", "Categorieën", "Orders");

$size = count($administration);

loadHeader();
showAdministration($administration, $size);
loadFooter();