<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 10:28
 */

include '../model/Database.class.php';
include '../view/LoginView.php';

include '../view/HeaderView.php';
include '../model/Navigation.class.php';
include '../view/FooterView.php';

// load views and if needed, give the models
loadHeader();
showLogin();
loadFooter();
