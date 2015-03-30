<?php
/**
 * Created by PhpStorm.
 * User: dionthiers
 * Date: 30/03/15
 * Time: 11:13
 */

include '../model/Database.class.php';
include '../model/Blog.class.php';
include '../view/blogView.php';

include '../view/headerView.php';
include '../model/Navigation.class.php';
include '../view/footerView.php';



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