<!--https://kunet.uk/k2130178/Project/Controller/LoginPage.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "Head.php"; ?>
    <title>Login</title>
    <style>
        <?php
        require_once "style.css";
        require_once "LoginPage.css";
        ?>
    </style>
</head>

<body>
    <?php require_once "NavBar.php"; ?>
    <hr>
    <main>
        <div class="login-form">
            <form class="login-form" action="../Controller/LoginPage.php">
                <h1>Login</h1>
                <input name="email" type="email" placeholder="email" required>
                <input name="password" type="text" placeholder="password" required>
                <button id="login-button" type="submit">Login</button>
            </form>
            <form>
                <a>Sign up</a>
            </form>
        </div>
    </main>
</body>
<script>
    <?php require_once "Login.js"; ?>
</script>

</html>