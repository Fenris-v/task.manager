<?php

if (!isset($_GET['msg'])) {
    header("location: /posts/");
}

require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

$msgId = mysqli_real_escape_string(database\connect(), $_GET['msg']);

mysqli_query(
    database\connect(),
    "UPDATE messages SET messages.read=true WHERE id=$msgId"
);

$result = mysqli_query(
    database\connect(),
    "SELECT title, m.date, text, CONCAT(s.name, ': ', s.email) AS sender FROM users AS u
LEFT JOIN messages AS m ON recipient_id = u.id
LEFT JOIN users AS s ON s.id = sender_id
WHERE m.id=$msgId"
);

if (mysqli_num_rows($result) > 0) {
    $msg = mysqli_fetch_assoc($result);
}

database\closeConnect(database\connect());

?>
    <div class="container container_view">
        <div class="view_title"><?= $msg['title'] . ' ' . $msg['date'] ?></div>
        <div class="view_sender"><?= $msg['sender'] ?></div>
        <div class="view_msg"><?= $msg['text'] ?></div>
    </div>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
