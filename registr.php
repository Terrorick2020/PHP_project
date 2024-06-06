<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    $website_title = "Registration";
    require_once "./bloks/head.php";
    ?>
</head>
<body>
    <?php require "./bloks/header.php" ?>
    <main>
        <h2>Registration</h2>
        <form>
            <label for="username">Name</label>
            <input type="text" name="username" id="username" placeholder="name">
            <label for="useremail">Email</label>
            <input type="email" name="useremail" id="useremail" placeholder="email">
            <label for="userpass">Password</label>
            <input type="password" name="userpass" id="userpass" placeholder="password">
            <div class="error-msg" id='error-block'></div>
            <button type="button" id='reg_user'>Registration</button>
        </form>
    </main>
    <?php include "./bloks/aside.php" ?>
    <?php require "./bloks/footer.php" ?>
    <script src='./JS/ajax_regr.js'></script>
</body>
</html>