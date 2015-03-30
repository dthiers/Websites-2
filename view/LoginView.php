<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 10:26
 */

function showLogin()
{
    ?>

    <div id="wrapper">
        <div id="main">
            <div id="content">
                <div class="container_login">
                    <div id="login">
                    <form method="GET" action="CheckLoginController.php">
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
                                <td></td>
                                <td><input type="submit" value="Login"></td>
                                <td>Nog geen account? Registreer <a href="RegisterController.php">hier</a></td>
                            </tr>
                        </table>
                    </form>
                    </div>
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