<?php

$connect = mysqli_connect($host, $user, $password, $dbName);
//if (!$connect) {
//    echo 'Код ошибки errno: ' . mysqli_connect_errno();
//    exit;
//}

$title = 'Project - ведение списков';
$h1 = 'Возможности проекта —';
$content = 'Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.';
$menuAuth = ['Авторизация', 'Регистрация', 'Забыли пароль?'];
$loginLabel = 'Ваш e-mail:';
$passwordLabel = 'Ваш пароль:';
$date = date('Y');
$imageSrc = '/i/logo.png';

$isAuth = false;

if (isset($_POST['send'])) {
    $user = mysqli_query($connect, "SELECT password FROM users WHERE name='$login'");
    if (mysqli_num_rows($user) > 0) {
        while ($row = mysqli_fetch_assoc($user)) {
            $isAuth = password_verify($_POST['password'], $row['password']);
        }
    }
}

mysqli_close($connect);
