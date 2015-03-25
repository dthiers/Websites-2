<!DOCTYPE html>
<html lang="en">


<head>

    <!-- title and meta -->
    <meta charset="utf-8" />

    <title>Test</title>

    <link rel="stylesheet" href="../css/style.css" />

    <!-- js -->
    <script src="../js/classie.js"></script>
    <script>
        function init() {
            window.addEventListener('scroll', function(e){
                var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                    shrinkOn = 65,
                    header = document.querySelector("header");
                if (distanceY > shrinkOn) {
                    classie.add(header,"smaller");
                } else {
                    if (classie.has(header,"smaller")) {
                        classie.remove(header,"smaller");
                    }
                }
            });
        }
        window.onload = init();
    </script>
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
                    <a href="<?php echo $navItem->getLink().'.php';?>"><?php echo $navItem->getLabel();?> </a>
                </div>
            <?php
            }
            ?>
            <div class="nav_item">
                <a href="#">Login </a>
            </div>


        </nav>
    </div>
</header><!-- /header -->

<body>