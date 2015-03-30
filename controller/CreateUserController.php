<?php
/**
 * Created by PhpStorm.
 * User: Raymond Phua
 * Date: 29-3-2015
 * Time: 16:02
 */

session_start();

include '../model/Database.class.php';
include '../model/User.class.php';
include '../view/RegisterView.php';
include '../view/HeaderView.php';
include '../view/FooterView.php';

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

$createUser = User::createUser($username, $password, $email, $phone, $firstName, $lastName, $address, $zip, $city, $country);

if ($createUser) {
    echo "U heeft succesvol geregistreerd, u wordt terug gebracht naar de webshop in 5 seconden...";
    header( "refresh:5;url=WebshopController.php" );
}
else {
    header("Location: RegisterController.php");
}
