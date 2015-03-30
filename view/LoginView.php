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
                    <div id="login_head">
                        <h1>Login</h1>
                    </div><!-- login_head -->
                    <div id="breadcrumbs">
                        <a href="../controller/HomeController.php">Home</a><span class="bread_pointer">></span>
                        <a href="../controller/LoginController.php">Login</a>
                    </div><!-- breadcrumbs -->
                    <div id="login">
                    <form method="GET" action="CheckLoginController.php" class="form-style">
                        <ul>
                            <li>
                                <label for="username">Gebruikersnaam: </label>
                                <input type="text" id="username" name="username" class="field-style field-split align-right" required=""/>
                            </li>
                            <li>
                                <label for="password">Wachtwoord: </label>
                                <input type="password" id="password" name="password" class="field-style field-split align-right" required/>
                            </li>
                            <li>
                                <p class="right">Nog geen account? Registreer <a href="RegisterController.php">hier</a></p>
                            </li>
                            <li>
                                <input type="submit" value="Login" class="align-right" />
                            </li>
                        </ul>
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