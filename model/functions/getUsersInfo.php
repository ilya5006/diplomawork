<?php

function getUsersInfo(mysqli $mysqli)
{
    return $mysqli->query("SELECT * FROM `users`")->fetch_all(MYSQLI_ASSOC);
}
