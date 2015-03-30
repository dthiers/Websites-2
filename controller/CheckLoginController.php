<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 11:03
 */

include '../model/Database.class.php';
include '../model/User.class.php';

$username = $_GET['username'];
$password = $_GET['password'];

if (User::checkLogin($username, $password) == "") {
    echo "gebruikersnaam/wachtwoord is incorrect!";
    echo "<a href='LoginController.php'>Terug</a>";
}
else {
    session_start();
    $_SESSION['username'] = $username;
    header("Location: WebshopController.php");
}