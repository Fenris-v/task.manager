<?php

$title = 'Project - ведение списков';
$h1 = 'Возможности проекта —';
$content = 'Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.';
$menuAuth = ['Авторизация', 'Регистрация', 'Забыли пароль?'];
$loginLabel = 'Ваш e-mail:';
$passwordLabel = 'Ваш пароль:';
$date = date('Y');
$imageSrc = '/i/logo.png';

$login = 'admin';
$password = '123qwe';

$isAuth = false;

if (isset($_POST['send'])) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/include/logins.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/include/passwords.php';

    if (!isset($_COOKIE['login'])) {
        $index = array_search($_POST['login'], $logins);
    } else {
        $index = array_search($_COOKIE['login'], $logins);
    }
    $isAuth = $index !== false && $_POST['password'] == $passwords[$index];

    !$isAuth ?: setcookie('login', $_POST['login'], time() + 30 * 24 * 60 * 60);
}
