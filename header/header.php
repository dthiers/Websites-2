<?php
session_start();

$username = "";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

$amount = 0;

if (isset($_SESSION['amount'])) {
    $amount = $_SESSION['amount'];
}
?>

<!DOCTYPE html>
<html lang="en">


<head>

    <!-- title and meta -->
    <meta charset="utf-8"/>

    <title>Webshop</title>

    <link rel="stylesheet" href="../css/style.css"/>
</head>

<header>
    <div class="container clearfix">
        <h1 id="logo">
            Webshop
        </h1>

        <nav>
            <?php
            $nav = Navigation::getNavigation();
            foreach ($nav as $navItem) {
                ?>
                <div class="nav_item">
                    <a href="<?php echo $navItem->getLink() . 'Controller.php'; ?>"><?php echo $navItem->getLabel(); ?> </a>
                </div>
            <?php
            }
            ?>
            <div class="nav_item">
                <a href="ShoppingCartController.php">Winkelwagen(<?php echo $amount; ?>)</a>
            </div>
            <?php
            if ($username == "") {
                ?>
                <div class="nav_item">
                    <a href="LoginController.php">Login</a>
                </div>
            <?php
            }
            elseif ($username == "admin") {
                ?>
                <div class="nav_item">
                    <a href="AdminController.php">Beheer</a>
                </div>
                <div class="nav_item">
                    <a href="LogoutController.php">Uitloggen</a>
                </div>
                <?php
            }
            else {
                ?>
                <div class="nav_item">
                    <a href="OrderController.php"><?php echo $username; ?></a>
                </div>
                <div class="nav_item">
                    <a href="LogoutController.php">Uitloggen</a>
                </div>
            <?php
            }
            ?>
        </nav>
    </div>
</header>
<!-- /header -->

<body>