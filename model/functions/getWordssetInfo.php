<?php

function getWordssetInfo(mysqli $mysqli, int $idWordsset)
{
    return $mysqli->query("SELECT * FROM `wordssets` WHERE `id` = $idWordsset")->fetch_assoc();
}