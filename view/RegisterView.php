<?php

function showRegister()
{
    ?>

    <div id="wrapper">
        <div id="main">
            <div id="content">

                <div id="container_register">
                    <div id="form_register_head">
                        <h1>Registreer nieuwe gebruiker</h1>
                    </div><!-- form_register_head -->
                    <div id="form_register">

                        <form class="form-style" method="POST" action="CreateUserController.php" onsubmit="return validate(this);">

                            <ul>
                                <li>
                                    <label for="username">Gebruikersnaam: </label>
                                    <input type="text" id="username" name="username" class="field-style field-split align-right" required/>
                                </li>
                                <li>
                                    <label for="password">Wachtwoord: </label>
                                    <input type="password" id="password" name="password" class="field-style field-split align-right" required />
                                </li>
                                <li>
                                    <label for="confirm-password">Bevestig wachtwoord: </label>
                                    <input type="password" id="confirm-password" name="confirm-password" class="field-style field-split align-right" required />
                                </li>
                                <li>
                                    <label for="email">E-mailadres</label>
                                    <input type="email" id="email" name="email" class="field-style field-split align-right" required />
                                </li>
                                <li>
                                    <label for="phone">Telefoonnummer</label>
                                    <input type="tel" id="phone" name="phone" class="field-style field-split align-right" />
                                </li>
                                <li>
                                    <label for="firstName">Voornaam</label>
                                    <input type="text" id="firstName" name="firstName" class="field-style field-split align-right" />
                                </li>
                                <li>
                                    <label for="lastname">Achternaam</label>
                                    <input type="text" id="lastName" name="lastName" class="field-style field-split align-right" />
                                </li>
                                <li>
                                    <label for="address">Adres</label>
                                    <input type="text" id="address" name="address" class="field-style field-split align-right" />
                                </li>
                                <li>
                                    <label for="zip">Postcode</label>
                                    <input type="text" id="zip" name="zip" class="field-style field-split align-right" />
                                </li>
                                <li>
                                    <label for="city">Plaatsnaam</label>
                                    <input type="text" id="city" name="city" class="field-style field-split align-right" />
                                </li>
                                <li>
                                    <label for="country">Land</label>
                                    <input type="text" id="country" name="country" class="field-style field-split align-right" />
                                </li>
                                <li>
                                    <input type="submit" value="Registreer" />
                                </li>

                            </ul>
                        </form>
                    </div><!-- form_register -->
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