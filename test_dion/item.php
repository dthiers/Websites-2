<!DOCTYPE html>
<html lang="en">

<?php
    include_once "header/header.php";
?>

<head>

    <!-- title and meta -->
    <meta charset="utf-8" />

    <title>Test</title>

    <link rel="stylesheet" href="css/style.css" />

    <!-- js -->
    <script src="js/classie.js"></script>
    <script>
        function init() {
            window.addEventListener('scroll', function(e){
                var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                    shrinkOn = 300,
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

<body>

<div id="wrapper">

    <div id="main">
        <div id="content">
            <div class="container_store2">
            <?php
                for($i = 0; $i < 7; $i++){?>
                    <div class="item">
                        <div class="image">
                            <img src=<?php echo"img/".(rand(1,5)).".jpg";?> >
                        </div>
                        <div class="title">
                            Dit is een test titel nummer <?php echo $i+1 ?>
                        </div>
                        <div class="price">
                            prijs: <?php echo(rand(0.1,1000)); ?>
                        </div>
                    </div>
            <?php
            }
            ?>
            </div><!-- container store -->
        </div><!-- content -->
    </div><!-- #main -->
    <div class="clearer"></div>
</div><!-- /#wrapper -->
<?php
    include_once "footer/footer.php";
?>


</body>
</html>