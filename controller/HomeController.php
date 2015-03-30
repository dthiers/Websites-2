<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 30/03/15
 * Time: 10:23
 */

session_start();

include '../model/Database.class.php';

include '../view/headerView.php';
include '../model/Navigation.class.php';
include '../view/homeView.php';
include '../view/footerView.php';


loadHeader();
loadHome();
loadFooter();