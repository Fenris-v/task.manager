<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

$users = database\getRecipients($_COOKIE['login']);
$sections = database\getMessagesSections();
?>
    <div class="container">
        <?php
        $canWrite = database\canWriteMsg($_COOKIE['login']);
        database\closeConnect(database\connect());
        if ($canWrite) : ?>
            <form method="post" action="/posts/add/sentMessage.php">
                <ul class="msg_form">
                    <li>
                        <label>Заголовок
                            <input name="title" type="text" required>
                        </label>
                    </li>
                    <li>
                        <label>Получатель
                            <select name="recipient" required>
                                <?php foreach ($users as $user) : ?>
                                    <option value="<?= $user['id']; ?>"><?= $user['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    </li>
                    <li>
                        <label>Раздел сообщения
                            <select name="section" required>
                                <?php foreach ($sections as $section) : ?>
                                    <option style="background: <?= $section['color'] ?>"
                                            value="<?= $section['id'] ?>"><?= $section['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    </li>
                    <li>
                        <label>Текст сообщения
                            <textarea name="text" required></textarea>
                        </label>
                    </li>
                    <li>
                        <input type="submit" value="Отправить">
                    </li>
                </ul>
            </form>
        <?php endif; ?>
    </div>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
