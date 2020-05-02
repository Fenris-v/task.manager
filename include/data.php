<?php

$title = 'Project - ведение списков';
$h1 = 'Возможности проекта —';
$content = 'Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.';
$menuAuth = ['Авторизация', 'Регистрация', 'Забыли пароль?'];
$loginLabel = 'Ваш e-mail:';
$passwordLabel = 'Ваш пароль:';
$date = date('Y');
$imageSrc = '/i/logo.png';

$isAuth = false;

if (
    isset($_POST['send']) && isset($_SESSION['isAuth']) && $_SESSION['isAuth'] !== true ||
    isset($_POST['send']) && !isset($_SESSION['isAuth'])
) {
    $login = mysqli_real_escape_string(database\connect(), $login);
    $user = mysqli_query(database\connect(), "SELECT password FROM users WHERE login='$login'");
    if (mysqli_num_rows($user) > 0) {
        while ($row = mysqli_fetch_assoc($user)) {
            $isAuth = password_verify($_POST['password'], $row['password']);
        }
    }

    !$isAuth ?: $_SESSION['isAuth'] = true;
    database\closeConnect(database\connect());
}

