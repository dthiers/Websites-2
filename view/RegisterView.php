<?php

function showRegister($categories)
{
    ?>

    <div id="wrapper">
        <div id="main">
            <div id="content">

                <!-- CATEGORY MENU -->
                <div id="categories">
                    <h1>Categories</h1>

                    <p>
                    <ul>
                        <?php
                        $counter = 0;
                        foreach ($categories as $categoryItem) {
                            if ($categoryItem->getParent() == 0) { ?>
                                <input id="<?php echo "input" . $counter; ?>" type="checkbox" class="main_category">
                                <li>
                                <a class="main" href="#"><?php echo $categoryItem->getName(); ?></a>
                                <label for="<?php echo "input" . $counter; ?>"><?php //echo $categoryItem->getName(); ?>
                                    ></label>
                            <?php
                            } ?>
                            <ul>
                                <?php
                                foreach ($categories as $item) {
                                    if ($categoryItem->getId() == $item->getParent()) {
                                        ?>
                                        <li><a href="#"><?php echo $item->getName(); ?></a></li>
                                    <?php
                                    }
                                } ?>
                            </ul></li>
                            <?php
                            $counter++;
                        }
                        ?>
                    </ul>
                    </p>
                </div>
                <!-- categories -->

                <div class="container_store2">
                    <form method="POST" action="#" onsubmit="return validate(this);">
                        <table>
                            <tr>
                                <td>Username:</td>
                                <td><input type="text" name="username" required></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input type="password" name="password" required></td>
                            </tr>
                            <tr>
                                <td>Confirm password:</td>
                                <td><input type="password" name="confirm-password" required></td>
                            </tr>
                            <tr>
                                <td>E-mail:</td>
                                <td><input type="text" name="email" required></td>
                            </tr>
                            <tr>
                                <td>Phone number:</td>
                                <td><input type="number" name="phone"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Create account"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <!-- container_store2 -->

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