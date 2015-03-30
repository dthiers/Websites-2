<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 12:48
 */

session_start();

$username = "";
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

include '../model/Database.class.php';
include '../model/Order.class.php';
include '../model/User.class.php';
include '../model/Product.class.php';

include '../view/headerView.php';
include '../model/Navigation.class.php';
include '../view/footerView.php';

if ($username != "") {
    $user = User::getUser($username);
    $orderedProducts = array();

    //fill products array
    foreach ($_SESSION['cart'] as $cartItem) {
        $product = Product::getProduct($cartItem);
        $orderedProducts[] = $product;
    }

    $order = Order::createOrder($user->getId(), 1, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), $user->getAddress(), $user->getZip(), $user->getCity(), $user->getCountry(), $orderedProducts);

    if ($order) {
        /*
        loadHeader();

        loadFooter();
        */
        header("Location: OrderController.php");
    }
    else {
        echo "error";
    }
}
else {
    echo "U moet eerst inloggen! <br>";
    echo "<a href='LoginController.php'>Login</a>";
}
