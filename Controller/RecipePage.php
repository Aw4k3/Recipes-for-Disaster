<?php
require_once "../Model/Recipe.php";
require_once "../Model/DataAccess.php";

Init();

$user = $_SESSION["user"];
$basket = $_SESSION["basket"];
$id = -1;

if (isset($_REQUEST["showrecipe"])) $id = $_REQUEST["showrecipe"];

global $pdo;
$statement = $pdo->prepare("SELECT * FROM Recipes WHERE id = ?");
$statement->execute([$id]);
$recipe = $statement->fetchAll(PDO::FETCH_CLASS, "Recipe")[0];

require_once "../View/NavBar.php";
require_once "../View/RecipePageV.php";
?>