<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

$login = mysqli_real_escape_string(database\connect(), $_COOKIE['login']);
$users = database\getRecipients($login);
$sections = database\getMessagesSections();
$isActive = database\canWriteMsg($login);

database\closeConnect(database\connect());
?>
    <div class="container">
        <?php if ($isActive) : ?>
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
                                    <option style="background: <?= $section['color'] ?>" value="<?= $section['id'] ?>"><?= $section['name'] ?></option>
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
        <?php else:
            include $_SERVER['DOCUMENT_ROOT'] . '/posts/templates/notActive.html';
        endif; ?>
    </div>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
