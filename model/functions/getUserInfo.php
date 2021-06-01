<?php

function getUserInfo(mysqli $mysqli, int $idUser)
{
    return $mysqli->query("SELECT * FROM `users` WHERE `id` = $idUser")->fetch_assoc();
}