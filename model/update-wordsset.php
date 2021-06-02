<?php 

require_once __DIR__ . '/functions/getMysqli.php';
require_once __DIR__ . '/config.php';

$mysqli = getMysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$id = (int) $_POST['id'];
$wordsset = htmlentities($mysqli->real_escape_string($_POST['wordsset']));

$mysqli->query(
    sprintf(
        'UPDATE `wordssets` SET `words` = "%s" WHERE `id` = %d',
        $wordsset,
        $id
    )
);
