<?php

$title = 'Project - ведение списков';
$menuNav = ['Главная', 'О нас', 'Контакты', 'Новости', 'Каталог'];
$h1 = 'Возможности проекта —';
$content = 'Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.';
$menuAuth = ['Авторизация', 'Регистрация', 'Забыли пароль?'];
$loginLabel = 'Ваш e-mail:';
$passwordLabel = 'Ваш пароль:';
$date = 2018;
$imageSrc = '/homework-3/i/logo.png';

$login = 'admin';
$password = '123qwe';

$isAuth = false;

if (isset($_POST['send'])) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/homework-3/include/logins.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/homework-3/include/passwords.php';

    $index = array_search($_POST['login'], $logins);

    ($index !== false && $_POST['password'] == $passwords[$index]) ? $isAuth = true : $isAuth = false;
}

//if (isset($_POST['send']) && $_POST['login'] == $login && $_POST['password'] == $password) {
//if (isset($_POST['send'])) {
//    foreach ($logins as $key => $login) {
//        if ($login == $_POST['login'] && $passwords[$key] == $_POST['password']) {
//            $isAuth = true;
//            break;
//        }
//    }
//}
