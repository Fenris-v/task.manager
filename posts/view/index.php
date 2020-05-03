<?php

if (!isset($_GET['msg'])) {
    header("location: /posts/");
}

require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

$msgId = mysqli_real_escape_string(database\connect(), $_GET['msg']);

database\updateMessageStatus($msgId);

$msg = database\getMessage($msgId);

database\closeConnect(database\connect());

?>
    <div class="container container_view">
        <?php if ($isActive) : ?>
            <div class="view_title"><?= $msg['title'] . ' ' . $msg['date'] ?></div>
            <div class="view_sender"><?= $msg['sender'] ?></div>
            <div class="view_msg"><?= $msg['text'] ?></div>
        <?php else:
            include $_SERVER['DOCUMENT_ROOT'] . '/posts/templates/notActive.html';
        endif; ?>
    </div>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
