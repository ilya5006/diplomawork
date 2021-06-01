<?php
session_start();

require_once __DIR__ . '/model/functions/isUserAdmin.php';
require_once __DIR__ . '/model/functions/getMysqli.php';
require_once __DIR__ . '/model/config.php';

$mysqli = getMysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (empty($_SESSION['id_user']) || ! isUserAdmin($mysqli, (int) $_SESSION['id_user'])) {
    header('Location: /');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Spectral+SC:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link rel="stylesheet" href="./assets/css/student-registration.css">

    <title>Регистрация студента</title>
</head>
<body>
    <?php 
    include './views/admin-registration.php';
    ?>
</body>
</html>