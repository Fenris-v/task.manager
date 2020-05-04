<?php

if (!isset($_GET['msg'])) {
    header("location: /posts/");
}

require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
?>
    <div class="container container_view">
        <?php
        $isActive = database\canWriteMsg($_COOKIE['login']);
        if ($isActive) {
            database\updateMessageStatus($_GET['msg']);
            $msg = database\getMessage($_GET['msg']);
        }
        database\closeConnect(database\connect());

        if ($isActive) : ?>
            <div class="view_title"><?= $msg['title'] . ' ' . $msg['date'] ?></div>
            <div class="view_sender"><?= $msg['sender'] ?></div>
            <div class="view_msg"><?= $msg['text'] ?></div>
        <?php endif; ?>
    </div>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
