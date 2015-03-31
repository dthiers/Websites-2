<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 31-3-2015
 * Time: 14:24
 */

if(!isset($_SESSION)){
    session_start();
}

include '../model/Database.class.php';
include '../view/AdminView.php';
include '../view/HeaderView.php';
include '../model/Navigation.class.php';
include '../view/FooterView.php';
include '../model/Category.class.php';

$categories = Category::getCategories();

loadHeader();
showCategoryList($categories);
loadFooter();