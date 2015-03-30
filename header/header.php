<?php
session_start();

$username = "";
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">


<head>

    <!-- title and meta -->
    <meta charset="utf-8" />

    <title>Webshop</title>

    <link rel="stylesheet" href="../css/style.css" />
</head>

<header>
    <div class="container clearfix">
        <h1 id="logo">
            Webshop
        </h1>

        <nav>
            <?php
            $nav = Navigation::getNavigation();
            foreach ($nav as $navItem){
                ?>
                <div class="nav_item">
                    <a href="<?php echo $navItem->getLink().'Controller.php';?>"><?php echo $navItem->getLabel();?> </a>
                </div>
            <?php
            }
            ?>
            <?php
            if ($username == "") {
            ?>
            <div class="nav_item">
                <a href="LoginController.php">Login</a>
            </div>
            <?php
            }
            else {
            ?>
            <div class="nav_item">
                <a href="LogoutController.php">Uitloggen</a>
            </div>
            <div class="nav_item nav_user">
                <?php echo $username; ?>
            </div>
            <?php
            }
            ?>
        </nav>
    </div>
</header><!-- /header -->

<body>