<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 30/03/15
 * Time: 18:01
 */

session_start();

include '../model/Database.class.php';

include '../view/HeaderView.php';
include '../model/Navigation.class.php';
include '../view/AboutView.php';
include '../view/FooterView.php';


loadHeader();
loadAbout();
loadFooter();