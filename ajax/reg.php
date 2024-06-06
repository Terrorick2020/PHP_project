<?php

$user_name = trim(htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8'));
$user_email = trim(filter_var($_POST['useremail'], FILTER_SANITIZE_EMAIL));
$user_pass = trim(htmlspecialchars($_POST['userpass'], ENT_QUOTES, 'UTF-8'));

$error = '';

if ( strlen($user_name) < 2 ) {
    $error = 'Введте имя';
}
else if ( strlen($user_email) < 5 ) {
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

$sql = "INSERT INTO users(`name`, `email`, `password`) VALUES(:name, :email, :password)";
$res = $pdo->prepare($sql);
$res->execute(["name" => $user_name, "email"=> $user_email,"password" => $hashed_password]);

echo "Done";