<?php 
require_once __DIR__ . '/functions/getMysqli.php';
require_once __DIR__ . '/config.php';

$mysqli = getMysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$name = htmlentities($mysqli->real_escape_string($_POST['name']));
$wordssetFile = $_FILES['file'];

if (mime_content_type($wordssetFile['tmp_name']) !== 'text/plain') {
    header('Location: /wordsset-create.php?error=Можно+загружать+только+текстовые+файлы');
    die();
}

$wordsset = htmlentities($mysqli->real_escape_string(file_get_contents($wordssetFile['tmp_name'])));

//sprintf() because of apostrophes
$mysqli->query(
    sprintf(
        'INSERT INTO `wordssets` VALUES (null, "%s", "%s")',
        $name,
        $wordsset
    )
);

$idWordsset = $mysqli->query("SELECT `id` FROM `wordssets` ORDER BY `id` DESC")->fetch_assoc()['id'];

header("Location: /wordsset-editor.php?id=$idWordsset");
