<?php

require_once __DIR__ . '/functions/getMysqli.php';
require_once __DIR__ . '/config.php';

$mysqli = getMysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$id = (int) $_GET['id'];

$mysqli->query("DELETE FROM `users` WHERE `id` = $id");

header('Location: /accounts-management.php');
