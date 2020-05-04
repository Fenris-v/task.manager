<?php

require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

$row = database\getUserData($_COOKIE['login']);
if (!empty($row)) :
    ?>
    <div class="container container_flex">
        <ul class="user_list">
            <li>Имя пользователя: <?= $row['user_name'] ?></li>
            <li>Акивность пользователя: <?= (bool)$row['activity'] === true ? 'Активен' : 'Не активен' ?></li>
            <li>Почта: <?= $row['email'] ?></li>
            <li>Телефон: <?= $row['phone'] ?></li>
            <li>Уведомления: <?= (bool)$row['notification'] === true ? 'Включены' : 'Выключены' ?></li>
            <li>Группы: <?= $row['group_name'] ?></li>
        </ul>
    </div>
<?php endif;
database\closeConnect(database\connect());
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
