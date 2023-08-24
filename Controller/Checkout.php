<?php
require_once "../Model/DataAccess.php";

Init();
$user = $_SESSION["user"];
$basket = $_SESSION["basket"];

if (isset($_REQUEST["buy"])) {
    ProcessOrders();
    echo("Orders have been processed");
}

require_once "../View/NavBar.php";
require_once "../View/CheckoutV.php";
?>