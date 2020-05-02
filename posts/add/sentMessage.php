<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/db/connect.php';

$title = mysqli_real_escape_string(database\connect(), $_POST['title']);
$recipient = mysqli_real_escape_string(database\connect(), $_POST['recipient']);
$section = mysqli_real_escape_string(database\connect(), $_POST['section']);
$text = mysqli_real_escape_string(database\connect(), $_POST['text']);
$sender = mysqli_real_escape_string(database\connect(), $_COOKIE['login']);

$result = mysqli_query(
    database\connect(),
    "SELECT id FROM users WHERE name='$recipient'"
);
$recipient_id = mysqli_fetch_assoc($result)['id'];

$result = mysqli_query(
    database\connect(),
    "SELECT id FROM users WHERE login='$sender'"
);

$sender_id = mysqli_fetch_assoc($result)['id'];

$date = date('Y-m-d H:i:s');

$result = mysqli_query(
    database\connect(),
    "SELECT id FROM users WHERE name='$recipient' || name='$sender'"
);

mysqli_query(
    database\connect(),
    "INSERT messages(title, text, sender_id, recipient_id, date)
VALUES ('$title', '$text', '$sender_id', $recipient_id, '$date')"
);

database\closeConnect(database\connect());

header('location: /posts/');
