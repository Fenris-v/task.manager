<?php

require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

$connect = mysqli_connect($host, $user, $password, $dbName);

$userData = mysqli_query($connect, "SELECT name, email, activity, phone, notification FROM users WHERE name='$login'");
var_dump($userData);

if (mysqli_num_rows($userData) > 0) {
    while ($row = mysqli_fetch_assoc($userData)) {
        var_dump($row['name']);
        var_dump($row['email']);
        var_dump((bool) $row['activity']);
        var_dump($row['phone']);
        var_dump((bool) $row['notification']);
    }
}

?>
    <div class="container">
        <ul class="user_list">
            <li>Имя пользователя:</li>
            <li>Акивность пользователя:</li>
            <li>Почта:</li>
            <li>Телефон:</li>
            <li>Уведомления:</li>
        </ul>
    </div>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
