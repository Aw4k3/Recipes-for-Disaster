<?php
require_once "../Model/Recipe.php";
require_once "../Model/DataAccess.php";


$id = -1;
$results;

if (isset($_REQUEST["deleterecipe"])) $id = $_REQUEST["deleterecipe"];

$results = GetAllRecipes();

require_once "../View/AdminPageV.php"
// This file is now redundant
?>