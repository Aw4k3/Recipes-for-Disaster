<?php
require_once "Basket.php";
require_once "Order.php";
require_once "Product.php";
require_once "Recipe.php";
require_once "User.php";

$pdo = new PDO("mysql:host=localhost; dbname=db_k2130178", "k2130178", "eengeidi", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

function Init() {
    if (isset($_SESSION["initialised"])) return;

    session_start();

    $user = new User();
    $user->displayname = "Not logged in";
    $user->guest = true;
    
    if (!isset($_SESSION["basket"])) $_SESSION["basket"] = new Basket();
    if (!isset($_SESSION["user"])) $_SESSION["user"] = $user;

    $_SESSION["initialised"] = true;
}

function GetAllRecipes()
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Recipes");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Recipe");
    return $results;
}

function GetFilteredRecipes()
{
    global $pdo;
    $search = "";
    $rating = 1;
    $veg = 0;
    $vegan = 0;
    $halal = 0;

    if (isset($_REQUEST["recipe-name"]) && $_REQUEST["recipe-name"] != "") $search = $_REQUEST["recipe-name"];
    if (isset($_REQUEST["rating"])) $rating = $_REQUEST["rating"];
    if (isset($_REQUEST["is-vegetarian"])) $veg = 1;
    if (isset($_REQUEST["is-vegan"])) $vegan = 1;
    if (isset($_REQUEST["is-halal"])) $halal = 1;

    // Build Statement
    $s = "SELECT * FROM Recipes WHERE ";
    $args = [];

    // if ($search != "") $args[] = "name LIKE \"%$search%\" OR ingredients LIKE \"%$search%\" OR instructions LIKE \"%$search%\"";
    // Using MATCH AGAINST instead of LIKE to allow for making more "natrual" searches without creating absurdly long sql statements
    // Watch as this some how breaks on the day of the submission >:(
    if ($search != "") $args[] = "MATCH(name, ingredients, instructions) AGAINST(\"$search\")";
    // Only add these if needed otherwise you won't get the expected search results
    if ($rating > 0) $args[] = "rating >= $rating";
    if ($veg == 1) $args[] = "vegetarian = 1";
    if ($vegan == 1) $args[] = "vegan = 1";
    if ($halal == 1) $args[] = "halal = 1";

    // Compile the SQL staatement
    $statement = $pdo->prepare($s . join(" AND ", $args));
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Recipe");
    return $results;
}

function AddRecipe()
{
    global $pdo;
    $name = "";
    $cooktime = 0;
    $rating = 1;
    $veg = 0;
    $vegan = 0;
    $halal = 0;
    $ingredients = 0;
    $instructions = 0;
    $coverimage = NULL;

    if (isset($_REQUEST["recipe-name"]) && $_REQUEST["recipe-name"] != "") $name = $_REQUEST["recipe-name"];
    if (isset($_REQUEST["cookingtime"])) $cooktime = $_REQUEST["cookingtime"];
    if (isset($_REQUEST["rating"])) $rating = $_REQUEST["rating"];
    if (isset($_REQUEST["is-vegetarian"])) $veg = 1;
    if (isset($_REQUEST["is-vegan"])) $vegan = 1;
    if (isset($_REQUEST["is-halal"])) $halal = 1;
    if (isset($_REQUEST["instructions"]) && $_REQUEST["instructions"] != "") $ingredients = $_REQUEST["instructions"];
    if (isset($_REQUEST["ingredients"]) && $_REQUEST["ingredients"] != "") $instructions = $_REQUEST["ingredients"];
    if (isset($_REQUEST["coverimage"]) && $_REQUEST["coverimage"] != "") $coverimage = $_REQUEST["coverimage"];

    $statement = $pdo->prepare("INSERT INTO Recipes (id, name, cookingtime, vegetarian, vegan, halal, rating, ingredients, instructions, coverimage) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $statement->execute([$name, $cooktime, $veg, $vegan, $halal, $rating, $ingredients, $instructions, $coverimage]);
}

function EditRecipe($id) {
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Recipes WHERE id = ?");
    $statement->execute([$id]);
    $_SESSION["editablerecipe"] = $statement->fetchAll(PDO::FETCH_CLASS, "Recipe")[0];
    header("Location: https://kunet.uk/k2130178/Project/Controller/EditRecipe.php");
    exit();
}

function SaveRecipe() {
    global $pdo;
    $id = -1;
    $name = "";
    $cooktime = 0;
    $rating = 1;
    $veg = 0;
    $vegan = 0;
    $halal = 0;
    $ingredients = "";
    $instructions = "";
    $coverimage = NULL;

    if (isset($_REQUEST["submitbutton"])) $id = $_REQUEST["submitbutton"];
    if (isset($_REQUEST["recipe-name"]) && $_REQUEST["recipe-name"] != "") $name = $_REQUEST["recipe-name"];
    if (isset($_REQUEST["cookingtime"])) $cooktime = $_REQUEST["cookingtime"];
    if (isset($_REQUEST["rating"])) $rating = $_REQUEST["rating"];
    if (isset($_REQUEST["is-vegetarian"])) $veg = 1;
    if (isset($_REQUEST["is-vegan"])) $vegan = 1;
    if (isset($_REQUEST["is-halal"])) $halal = 1;
    if (isset($_REQUEST["ingredients"]) && $_REQUEST["ingredients"] != "") $instructions = $_REQUEST["ingredients"];
    if (isset($_REQUEST["instructions"]) && $_REQUEST["instructions"] != "") $ingredients = $_REQUEST["instructions"];
    if (isset($_REQUEST["coverimage"]) && $_REQUEST["coverimage"] != "") $coverimage = $_REQUEST["coverimage"];

    $statement = $pdo->prepare("UPDATE Recipes SET name = ?, cookingtime = ?, vegetarian = ?, vegan = ?, halal = ?, rating = ?, ingredients = ?, instructions = ?, coverimage = ? WHERE id = ?");
    $statement->execute([$name, $cooktime, $veg, $vegan, $halal, $rating, $ingredients, $instructions, $coverimage, $id]);
    header("Location: https://kunet.uk/k2130178/Project/Controller/AdminPage.php");
    exit();
}

function DeleteRecipe($id) {
    global $pdo;
    $statement = $pdo->prepare("DELETE FROM Recipes WHERE id = ?");
    $statement->execute([$id]);
}

function TryLogin()
{
    global $pdo;

    if (isset($_REQUEST["email"]) && isset($_REQUEST["password"])) {
        $statement = $pdo->prepare("SELECT id, email, displayname, admin, customerid FROM Users WHERE email = ? AND password = ?");
        $statement->execute([$_REQUEST["email"], $_REQUEST["password"]]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "User");
        if (count($results) > 0) return $results[0];
        else return null;
    } else {
        return null;
    }
}

function AddToBasket()
{
    if (!isset($_SESSION["basket"])) $_SESSION["basket"] = new Basket();
    else $basket = $_SESSION["basket"];
    
    if (!isset($_REQUEST["add-to-basket"])) return;
    $id = $_REQUEST["add-to-basket"];
    
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Products WHERE id = ?");
    $statement->execute([$id]);
    $product = $statement->fetchAll(PDO::FETCH_CLASS, "Product")[0];
    $basket->AddProduct($product);
    $_SESSION["basket"] = $basket;
}

function ProcessOrders() {
    global $pdo;
    $user = $_SESSION["user"];
    $basket = $_SESSION["basket"];

    foreach ($basket->items as $item) {
        $statement = $pdo->prepare("INSERT INTO Orders (id, customerid, productid) VALUES (NULL, ?, ?)");
        $statement->execute([$item->id, $user->id]);
    }
}