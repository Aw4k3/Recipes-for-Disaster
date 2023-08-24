<!-- https://kunet.uk/k2130178/Project/Controller/AddRecipe.php -->

<?php
require_once "../Model/Recipe.php";
require_once "../Model/DataAccess.php";

Init();

$user = $_SESSION["user"];
$basket = $_SESSION["basket"];

require_once "../View/NavBar.php";

if (isset($_REQUEST["submitbutton"])) {
    AddRecipe();
    header("Location: https://kunet.uk/k2130178/Project/Controller/AdminPage.php");
    exit();
} else {
    require_once "../View/AddRecipeV.php";
}

?>