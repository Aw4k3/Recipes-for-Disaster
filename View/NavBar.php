<nav>
    <a href="../Controller/HomePage.php" style="text-decoration: none; color: black;"><h1>Recipes for Disaster</h1></a>
    <div class="user-items">
        <div style="display: flex; align-items: center; gap: 4px;">
            <div class="dropdown">
                <a href="../Controller/Checkout.php" style="height: 100%; text-decoration: none; display: flex; align-items: center; gap: 4px; color: black;">
                    <span><?= count($basket->items); ?></span>
                    <span class="material-symbols-outlined">shopping_basket</span>
                </a>
                <div class="dropdown-container">
                    <form action="../Controller/Checkout.php" method="post">
                        <button name="showbasket" type="submit">Go to Basket</button>
                    </form>
                    <form action="../Controller/LoginPage.php" method="post">
                        <button name="clearbasket" type="submit">Clear Basket</button>
                    </form>
                </div>
            </div>
            <p class="hidden-on-mobile"><?= $user->displayname; ?></p>
            <div class="dropdown">
                <a href="../Controller/LoginPage.php">
                    <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" width="40px" alt="Profile Picture">
                </a>
                <div class="dropdown-container">
                    <p><?= $user->displayname; ?></p>
                    <form action="../Controller/LoginPage.php" method="post">
                        <button name="logout">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>