<?php
include('../model/Database.class.php');
include('../model/Product.class.php');

$product = new Product(0, 'TestSKU3', 'testNaam3', "testDescription3", 20.0, 40);

//test
$databaas = Database::getDatabase();
//$databaas->createProduct($product, 1);
?>