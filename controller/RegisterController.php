<?php
/**
 * Created by PhpStorm.
 * User: Raymond Phua
 * Date: 26-3-2015
 * Time: 22:43
 */

include '../model/Database.class.php';
include '../view/RegisterView.php';
include '../model/User.class.php';

include '../view/HeaderView.php';
include '../model/Navigation.class.php';
include '../view/FooterView.php';

if(!isset($_SESSION)){
    session_start();
}

if(!empty($_POST)){
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
        unset($_POST);
        $_POST = array();

        header("Location: ../controller/RegisterController.php");
    }
}

// load views and if needed, give the models
loadHeader();
showRegister();
loadFooter();