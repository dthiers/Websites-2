<?php
/**
 * Created by PhpStorm.
 * User: Raymond Phua
 * Date: 26-3-2015
 * Time: 22:43
 */

include '../model/Database.class.php';
include '../view/RegisterView.php';

include '../view/headerView.php';
include '../model/Navigation.class.php';
include '../model/Category.class.php';
include '../view/footerView.php';

$categories = Category::getCategories();

// load views and if needed, give the models
loadHeader();
showRegister($categories);
loadFooter();