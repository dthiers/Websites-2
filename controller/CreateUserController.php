<?php
/**
 * Created by PhpStorm.
 * User: Raymond Phua
 * Date: 29-3-2015
 * Time: 16:02
 */

include '../model/Database.class.php';
include '../model/User.class.php';
include '../view/RegisterView.php';
include '../view/headerView.php';
include '../view/footerView.php';

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$city = $_POST['city'];
$country = $_POST['country'];

$user = new User(null, $username, $password, $email, $phone, $firstName, $lastName, $address, $zip, $city, $country);

$db = Database::getDatabase();
if ($db->createUser($user)) {
    echo "U heeft succesvol geregistreerd, u wordt terug gebracht naar de webshop in 5 seconden...";
    header( "refresh:5;url=../controller/IndexController.php" );
}
else {
    header("Location: ../controller/RegisterController.php");
}
