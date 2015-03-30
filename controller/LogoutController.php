<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 11:26
 */

session_start();

session_unset();
session_destroy();

header("Location: WebshopController.php");