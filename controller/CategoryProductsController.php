<?php
/**
 * Created by PhpStorm.
 * User: Raymond Phua
 * Date: 29-3-2015
 * Time: 23:12
 */

session_start();

include '../model/Database.class.php';
include '../model/Product.class.php';
include '../view/WebshopView.php';
include '../view/HeaderView.php';
include '../model/Navigation.class.php';
include '../model/Category.class.php';
include '../view/FooterView.php';

$categoryId = $_GET['id'];
$products = Product::getAllProductsFromCategory($categoryId);
$categories = Category::getCategories();

loadHeader();
loadProducts($products, $categories);
loadFooter();