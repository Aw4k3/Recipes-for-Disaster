<!-- https://kunet.uk/k2130178/Project/Controller/HomePage.php -->

<!DOCTYPE html>
<html>

<head>
    <?php require_once "Head.php"; ?>
    <title>Recipes for Disaster</title>
</head>

<body>
    <?php require_once "NavBar.php"; ?>
    <hr>
    <main>
        <!-- Filtering Recipes -->
        <form style="display: grid; gap: 10px;" class="filter-panel" action="../Controller/HomePage.php" method="post">
            <!-- Search Bar -->
            <div class="filter-row" style="flex-direction: row; display: flex;">
                <input type="text" name="recipe-name" placeholder="Search">
                    <button type="submit" id="search-button">Search</button>
                <span id="filter-button" class="material-symbols-outlined">filter_list</span>
            </div>

            <!-- Filter Options -->
            <div id="filter-options" class="filter-row">
                <select name="rating">
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars and Above</option>
                    <option value="3">3 Stars and Above</option>
                    <option value="2">2 Stars and Above</option>
                    <option value="1">1 Star and Above</option>
                    <option value="1" selected>Any Rating</option>
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
                <button type="submit">Search</button>
            </div>
        </form>
        <hr>
        <!-- Recipe Cards -->
        <div class="card-viewer">
            <?php foreach ($results as $recipe) : ?>
                <div class="card">
                    <img src="<?= $recipe->coverimage ?>" alt="Dish Image">
                    <form action="../Controller/RecipePage.php" method="post">
                        <button name="showrecipe" class="hyperlink-button" type="submit" value="<?= $recipe->id ?>"><?= $recipe->name ?></button>
                    </form>
                    <p>★ <?= $recipe->rating ?> • <?= $recipe->cookingtime ?> minutes</p>
                    <p><?= $recipe->GetWarnings() ?></p>
                    <form action="../Controller/HomePage.php" method="post">
                        <button name="add-to-basket" value="<?= $recipe->id ?>">Add to Basket <span class="material-symbols-outlined">shopping_cart_checkout</span></button>
                    </form>
                </div>
            <?php endforeach ?>
        </div>
    </main>
    <footer>
        
    </footer>
</body>
<script>
    <?php require_once "FiltersPanel.js" ?>
</script>

</html>