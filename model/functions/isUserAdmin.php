<?php

function isUserAdmin(mysqli $mysqli, int $idUser)
{
    return $mysqli->query("SELECT `id_role` FROM `users` WHERE id = $idUser")->fetch_assoc()['id_role'] == 1;
}

