<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    $website_title = "Login";
    require_once "./bloks/head.php";
    ?>
</head>
<body>
    <?php require "./bloks/header.php" ?>
    <main>
        <?php if( !isset( $_COOKIE['email'] ) ) : ?>
            <h2>Login</h2>
            <form>
                <label for="useremail">Email</label>
                <input type="email" name="useremail" id="useremail" placeholder="email">
                <label for="userpass">Password</label>
                <input type="password" name="userpass" id="userpass" placeholder="password">
                <div class="error-msg" id='error-block'></div>
                <button type="button" id='login_user'>Login</button>
            </form>
        <?php else :?>
            <h2>Login: <?= $_COOKIE["email"] ?></h2>
            <form>
                <button type="button" id="exit_user">Exit</button>
            </form>
        <?php endif; ?>
    </main>
    <?php include "./bloks/aside.php" ?>
    <?php require "./bloks/footer.php" ?>
    <script src='./JS/ajax_login.js'></script>
    <script src='./JS/ajax_exit.js'></script>
</body>
</html>