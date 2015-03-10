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
            <div class="container_store">
            <?php
                for($i = 0; $i < 18; $i++){?>
                    <div class="container_element">
                        artikel <?php echo $i+1 ?>
                    </div>
            <?php
            }
            ?>
            </div><!-- container store -->
        </div><!-- content -->
        <div class="clearer">

        </div>
    </div><!-- #main -->



</div><!-- /#wrapper -->
<?php
include_once "footer/footer.php";
?>

</body>
</html>