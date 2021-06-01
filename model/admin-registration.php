<?php

require_once __DIR__ . '/functions/getMysqli.php';
require_once __DIR__ . '/config.php';

$mysqli = getMysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$login = htmlentities($mysqli->real_escape_string($_POST['login']));
$passwordHash = password_hash(
    htmlentities($mysqli->real_escape_string($_POST['password'])),
    PASSWORD_DEFAULT
);
$fio = htmlentities($mysqli->real_escape_string($_POST['fio']));
$idRole = 1; // administrator

$isUserExists = $mysqli->query("SELECT COUNT(*) as `count` FROM `users` WHERE `login` = '$login'")->fetch_assoc()['count'] > 0;

if ($isUserExists) {
    header('Location: /student-registration.php?error=Пользователь+с+таким+логином+уже+существует');
    die();
}

$mysqli->query("INSERT INTO `users` VALUES (null, '$login', '$passwordHash', '$fio', $idRole)");

header('Location: /accounts-management.php');