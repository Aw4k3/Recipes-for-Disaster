<!-- https://kunet.uk/k2130178/Project/Controller/AddRecipe.php -->

<?php
require_once "../Model/Recipe.php";
require_once "../Model/DataAccess.php";

Init();
$user = $_SESSION["user"];
$basket = $_SESSION["basket"];
$recipe = $_SESSION["editablerecipe"];

require_once "../View/NavBar.php";

if (isset($_REQUEST["submitbutton"])) {
    SaveRecipe();
    header("Location: https://kunet.uk/k2130178/Project/Controller/AdminPage.php");
    exit();
} else {
    require_once "../View/EditRecipeV.php";
}

?>