<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 16:52
 */

function showAdministration($administrations, $size)
{
    ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">

                <div id="container_home">
                    <div id="content_home">
                        <h1>Beheer</h1>
                        <?php
                        for ($i = 0; $i < $size; $i++) {
                            ?>
                            <div class="order_container">
                                <p>
                                    <?php echo "<p>" . $administrations[$i] . " Beheer </p>"; ?>
                                    <!--<a href="#" class="fill_order_container"></a>-->
                                </p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- content_home -->
                </div>
                <!-- container_home -->

            </div>
            <!-- content -->
            <div class="clearer"></div>
            <!-- clearer -->

        </div>
        <!-- main -->
        <div class="clearer"></div>
        <!-- clearer -->
        <div class="push"></div>
        <!-- push -->
    </div><!-- wrapper -->
<?php
}

?>