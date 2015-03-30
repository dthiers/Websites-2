<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 30/03/15
 * Time: 10:23
 */

if(!isset($_SESSION)){
    session_start();
}

include '../model/Database.class.php';

include '../view/HeaderView.php';
include '../model/Navigation.class.php';
include '../view/HomeView.php';
include '../view/FooterView.php';


loadHeader();
loadHome();
loadFooter();