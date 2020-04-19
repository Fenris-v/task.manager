<?php

require_once __DIR__ . '/logins.php';
require_once __DIR__ . '/passwords.php';

$title = 'Project - ведение списков';
$menuNav = ['Главная', 'О нас', 'Контакты', 'Новости', 'Каталог'];
$h1 = 'Возможности проекта —';
$content = 'Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.';
$menuAuth = ['Авторизация', 'Регистрация', 'Забыли пароль?'];
$loginLabel = 'Ваш e-mail:';
$passwordLabel = 'Ваш пароль:';
$date = 2018;
$imageSrc = '/i/logo.png';

$login = 'admin';
$password = '123qwe';

$success = false;

//if (isset($_POST['send']) && $_POST['login'] == $login && $_POST['password'] == $password) {
if (isset($_POST['send']) && in_array($_POST['login'], $logins)) {
    foreach ($logins as $key => $login) {
        if ($login == $_POST['login'] && $passwords[$key] == $_POST['password']) {
            $success = true;
        }
    }
}
