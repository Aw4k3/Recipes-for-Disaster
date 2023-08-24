<!--https://kunet.uk/k2130178/Project/Controller/AdminPage.php -->

<?php
require_once "../Model/DataAccess.php";

Init();

if (isset($_REQUEST["add-to-basket"])) AddToBasket($_REQUEST["add-to-basket"]);
if (isset($_REQUEST["editrecipe"])) EditRecipe($_REQUEST["editrecipe"]);
if (isset($_REQUEST["deleterecipe"])) DeleteRecipe($_REQUEST["deleterecipe"]);

$results = GetFilteredRecipes();
$user = $_SESSION["user"];
$basket = $_SESSION["basket"];

require_once "../View/NavBar.php";
require_once "../View/AdminPageV.php"
?>