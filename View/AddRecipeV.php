<!--https://kunet.uk/k2130178/Project/Controller/LoginPage.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "Head.php"; ?>
    <title>Add Recipe</title>
    <style>
        <?php
        require_once "style.css";
        require_once "AddRecipe.css";
        ?>
    </style>
</head>

<body>
    <?php require_once "NavBar.php"; ?>
    <hr>
    <main>
        <form class="filter-panel add-recipe-panel" action="../Controller/AddRecipe.php" method="post">
            <div class="filter-row" style="display: grid; gap: 8px; justify-content: stretch;">
                <input type="text" name="recipe-name" placeholder="Recipe Name">
                <input type="text" name="cookingtime" placeholder="Cooking Time">
                <select name="rating" style="width: auto;">
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1" default>1 Star</option>
                </select>

                <div class="checkbox-array">
                    <div class="checkbox">
                        <p>Vegetarian</p>
                        <input type="checkbox" name="is-vegetarian">
                    </div>

                    <div class="checkbox">
                        <p>Vegan</p>
                        <input type="checkbox" name="is-vegan">
                    </div>

                    <div class="checkbox">
                        <p>Halal</p>
                        <input type="checkbox" name="is-halal">
                    </div>
                </div>

                <textarea name="ingredients" placeholder="Ingredients List"></textarea>
                <textarea name="instructions" placeholder="Instructions"></textarea>
                <input type="text" name="coverimage" placeholder="Cover image (direct link)">

                <button name="submitbutton" type="submit">Add Recipe</button>
            </div>
        </form>
    </main>
</body>
<script>
    <?php require_once "Login.js"; ?>
</script>

</html>