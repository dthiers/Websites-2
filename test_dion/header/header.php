<header>
    <div class="container clearfix">
        <h1 id="logo">
            Webshop
        </h1>
        <nav>

            <?php
                for ($i = 0; $i < 5; $i++){
            ?>
                    <div class="nav_item">
                        <a href="#">Test <?php echo $i+1?> </a>
                    </div>
            <?php
                }
            ?>
        </nav>
    </div>
</header><!-- /header -->