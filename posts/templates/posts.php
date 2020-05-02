<?php
$login = mysqli_real_escape_string(database\connect(), $login);
$result = mysqli_query(
    database\connect(),
    "SELECT activity, title, `read`, messages.id AS id FROM users
LEFT JOIN messages ON recipient_id=users.id
WHERE login='$login'"
);

$messages = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }
}

database\closeConnect(database\connect());
?>
    <div class="container">
        <?php if (!isset($messages[0]['activity']) || !$messages[0]['activity']): ?>
            <p>Вы сможете отправлять сообщения после прохождения модерации</p>
        <?php else: ?>

            <a class="msg_add" href="/posts/add/">Написать сообщение</a>

            <div class="msg_container">
                <div class="msg_half">
                    <h2>Непрочитанные сообщения</h2>
                    <ul>
                        <?php foreach ($messages as $msg) :
                            if (!(bool)$msg['read']) : ?>
                                <li><a href="/posts/view?msg=<?= $msg['id'] ?>"><?= $msg['title'] ?></a></li>
                            <?php endif;
                        endforeach; ?>
                    </ul>
                </div>

                <div class="msg_half">
                    <h2>Прочитанные сообщения</h2>
                    <ul>
                        <?php foreach ($messages as $msg) :
                            if ((bool)$msg['read']) : ?>
                                <li><a href="/posts/view?msg=<?= $msg['id'] ?>"><?= $msg['title'] ?></a></li>
                            <?php endif;
                        endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php
