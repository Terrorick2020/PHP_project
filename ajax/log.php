<?php

$user_email = trim(filter_var($_POST['useremail'], FILTER_SANITIZE_EMAIL));
$user_pass = trim(htmlspecialchars($_POST['userpass'], ENT_QUOTES, 'UTF-8'));

$error = '';

if ( strlen($user_email) < 5 ) {
    $error = 'Введте почту';
}
else if ( strlen($user_pass) < 4 ) {
    $error = 'Введте пароль';
}

if (strlen($error) != 0) {
    echo $error;
    exit();
}

$hashed_password = md5($user_pass);

$user = 'root';
$password = 'root';
$db = 'webblog';
$host = 'localhost';
$port = 3306;



$dsn = "mysql:host=$host;dbname=$db;port=$port";
$pdo = new PDO($dsn, $user, $password);
$pdo->exec("SET NAMES utf8");

$sql = "SELECT id FROM users WHERE `email`=:email AND `password`=:pass";
$res = $pdo->prepare($sql);
$res->execute(["email" => $user_email, "pass" => $hashed_password]);

if($res->rowCount() == 0) {
    echo "Такого пользователя нет!";
} else {
    setcookie('email', $user_email, time() + 3600, '/');
    echo "Done";
}
