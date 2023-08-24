<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "Head.php"; ?>
    <title>Checkout</title>
    <style>
        <?php require_once "Checkout.css"; ?>
    </style>
</head>

<body>
    <?php require_once "NavBar.php"; ?>
    <hr>
    <main>
        <!-- List all of the basket items -->
        <section class="collapsible">
            <header class="collapsible-header">
                <h1>Items</h1>
                <span class="material-symbols-outlined" id="toggle-items-panel">expand_less</span>
            </header>
            <div class="collapsible-content" id="items-content">
                <?php foreach ($basket->items as $item) : ?>
                    <div class="item-container">
                        <div>
                            <h1><?= $item->name ?></h1>
                            <p>£<?= $item->GetPrice(); ?></p>
                        </div>
                        <div style="display: grid; justify-content: stretch; align-items: center;">
                            <button style="background-color: rgb(191, 3, 0);">Remove</button>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>

        <!-- Payment details -->
        <section class="collapsible">
            <header class="collapsible-header">
                <h1>Payment Details</h1>
                <span class="material-symbols-outlined" id="toggle-payment-panel">expand_less</span>
            </header>
            <div class="collapsible-content" id="payment-details">
                <form action="" style="display: grid; gap: 8px;">
                    <input type="text" name="card-name" placeholder="Card Holder Name">
                    <input type="text" name="card-number" placeholder="Card Number" maxlength="20">
                    <div style="display: flex; align-items: center; gap: 4px;">
                        <input type="text" name="expiry-month" placeholder="MM" maxlength="2">
                        /
                        <input type="text" name="expiry-month" placeholder="YYYY" maxlength="4">
                    </div>
                    <input type="text" name="expiry-month" placeholder="Security Code" maxlength="3">
                    <button type="submit">Save Payment Details</button>
                </form>
            </div>
        </section>

        <!-- Delivery Details -->
        <section class="collapsible">
            <header class="collapsible-header">
                <h1>Delivery Details</h1>
                <span class="material-symbols-outlined" id="toggle-delivery-panel">expand_less</span>
            </header>
            <div class="collapsible-content" id="delivery-details">
                <form action="" style="display: grid; gap: 8px;">
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="phone-number" placeholder="Phone Number">
                    <input type="text" name="address-line-one" placeholder="Address Line 1">
                    <input type="text" name="address-line-two" placeholder="Address Line 2">
                    <div class="info-matrix">
                        <input type="text" name="City" placeholder="City">
                        <input type="text" name="state-province" placeholder="State/Province">
                        <input type="text" name="postcode" placeholder="Postcode">
                        <input type="text" name="country" placeholder="Country">
                    </div>
                    <textarea name="comments" placeholder="Comments"></textarea>
                    <button type="submit">Save Delivery Details</button>
                </form>
            </div>
        </section>
        <form action="../Controller/Checkout.php" method="post">
            <button name="buy" value="buy" type="submit">Buy</button>
        </form>
    </main>
    <footer>

    </footer>
</body>
<script>
    <?= require_once "Checkout.js" ?>
</script>

</html>