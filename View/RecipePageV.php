<!-- https://kunet.uk/k2130178/Project/Controller/RecipePage.php -->

<!DOCTYPE html>
<html>

<head>
    <?php require_once "Head.php"; ?>
    <title>Recipes for Disaster</title>
    <style>
        <?php
        require_once "style.css";
        require_once "RecipePage.css";
        ?>
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;700&family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
    <?php require_once "NavBar.php"; ?>
    <hr>
    <main>
        <div class="banner">
            <img src="<?= $recipe->coverimage ?>" width="100%">
        </div>
        <div style="display: grid; gap: 10px;">
            <h1><?= $recipe->name ?></h1>
            <p>Cooking time: <?= $recipe->cookingtime ?> minutes</p>
            <p><?= $recipe->GetWarnings() ?></p>
            <p><b>What you will need:</b></p>
            <p><?= $recipe->GetIngredients() ?></p>
            <p><b>Instructions:</b></p>
            <p><?= $recipe->GetInstructions() ?></p>
        </div>
    </main>
</body>

</html>