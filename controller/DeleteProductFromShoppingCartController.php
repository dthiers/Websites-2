<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 31/03/15
 * Time: 14:55
 */

if(!ISSET($_SESSION)){
    session_start();
}

$id = $_GET['id'];
$itemDeleted = false;

foreach($_SESSION['cart'] as $key => $productId){
    if (!$itemDeleted && $productId == $id){
        unset($_SESSION['cart'][$key]);

        $_SESSION['amount'] -= 1;

        $itemDeleted = !$itemDeleted;
    }
}

header("location: ShoppingCartController.php");