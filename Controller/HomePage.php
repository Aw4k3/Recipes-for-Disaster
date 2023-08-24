<!--https://kunet.uk/k2130178/Project/Controller/HomePage.php -->

<?php
require_once "../Model/DataAccess.php";

Init();

if (isset($_REQUEST["add-to-basket"])) AddToBasket($_REQUEST["add-to-basket"]);

$results = GetFilteredRecipes();
$user = $_SESSION["user"];
$basket = $_SESSION["basket"];

require_once "../View/NavBar.php";
require_once "../View/HomePageV.php";
?>