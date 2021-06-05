<?php

function getUserInfo(mysqli $mysqli, int $idUser)
{
    $userInfo = $mysqli->query("SELECT * FROM `users` WHERE `id` = $idUser")->fetch_assoc();
    
    $isUserAdmin = $userInfo['id_role'] == 1;

    if ($isUserAdmin) {
        $userInfo['role'] = 'Администратор';
    } else {
        $idUser = $userInfo['id'];

        $userInfo['role'] = 'Студент';
        $userInfo['group'] = $mysqli->query("SELECT `id_group` FROM `id_group_id_user` WHERE `id_user` = $idUser")->fetch_assoc()['id_group'];
    }

    return $userInfo;
}