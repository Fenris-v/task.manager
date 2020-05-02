<?php

require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

$login = mysqli_real_escape_string(database\connect(), $login);
$userData = mysqli_query(
    database\connect(),
    "SELECT u.name AS user_name, u.email, u.activity, u.phone, u.notification, 
       GROUP_CONCAT(g.name SEPARATOR ', ') AS group_name
FROM users AS u
LEFT JOIN user_group AS ug ON ug.user_id=u.id
LEFT JOIN `groups` AS g ON g.id=ug.group_id
WHERE u.login='$login'"
);

if (mysqli_num_rows($userData) > 0) :
    $row = mysqli_fetch_assoc($userData); ?>
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
