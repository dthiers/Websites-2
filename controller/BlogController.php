<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 30/03/15
 * Time: 11:13
 */

if(!isset($_SESSION)){
    session_start();
}

include '../model/Database.class.php';
include '../model/Blog.class.php';
include '../view/BlogView.php';

include '../view/HeaderView.php';
include '../model/Navigation.class.php';
include '../view/FooterView.php';



if(!empty($_POST)){
    $username = $_POST['username'];
    $title = $_POST['title'];
    $text = $_POST['text'];

    $blog = new Blog(null, $username, $title, $text);

    $db = Database::getDatabase();
    if ($db->createBlog($blog)){
        unset($_POST);
        $_POST = array();

        header("Location: ../controller/BlogController.php");
    }

}

$blog = Blog::getBlog();

loadHeader();
loadBlog($blog);
loadFooter();