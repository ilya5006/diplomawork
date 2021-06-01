<?php

session_start();

require_once __DIR__ . '/functions/getMysqli.php';
require_once __DIR__ . '/config.php';

$mysqli = getMysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$login = htmlentities($mysqli->real_escape_string($_POST['login']));
$password = htmlentities($mysqli->real_escape_string($_POST['password']));

$userInfoQueryResult = $mysqli->query(
    "SELECT 
        `users`.*,
        `roles`.`role` AS `role`
    FROM `users`, `roles`
    WHERE `users`.`login` = '$login'
    AND `users`.`id_role` = `roles`.`id`
    "
);

if ($userInfoQueryResult->num_rows != 1) {
    header('Location: /login.php?error=Такого+пользователя+не+существует');
    die();
}

$userInfo = $userInfoQueryResult->fetch_assoc();

if (! password_verify($password, $userInfo['password'])) {
    header('Location: /login.php?error=Введённый+вами+пароль+некоректен');
    die();
}

$_SESSION['id_user'] = $userInfo['id'];

if ($userInfo['role'] == 'Администратор') {
    header('Location: /admin.php');
} else {
    header('Location: /');
}