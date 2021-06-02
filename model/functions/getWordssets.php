<?php

function getWordssets(mysqli $mysqli)
{
    return $mysqli->query("SELECT * FROM `wordssets`")->fetch_all(MYSQLI_ASSOC);    
}