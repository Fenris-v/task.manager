<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/db/connect.php';

$title = mysqli_real_escape_string(database\connect(), $_POST['title']);
$recipient = mysqli_real_escape_string(database\connect(), $_POST['recipient']);
$section = mysqli_real_escape_string(database\connect(), $_POST['section']);
$text = mysqli_real_escape_string(database\connect(), $_POST['text']);
$sender = mysqli_real_escape_string(database\connect(), $_COOKIE['login']);

mysqli_query(
    database\connect(),
    "INSERT messages(title, text, sender_id, recipient_id)
VALUES ('$title', '$text', 5, 1)"
);
