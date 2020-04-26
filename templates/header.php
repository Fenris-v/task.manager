<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/data.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/main_menu.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/renderElements.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/css/styles.css" rel="stylesheet">
    <title><?= $title ?></title>
</head>

<body>

<div class="header">
    <div class="logo"><img src="<?= $imageSrc ?>" alt="Project"></div>
    <div class="clearfix"></div>
</div>

<div class="clear">
    <?php
    // Не понимаю зачем здесь инклуд, если можно просто вызвать функцию при помощи неймспейса
    // Если же не создавать функцию в файле menu.php, то как передавать аргументы? Сортировка разная в хэдере и футере,
    // потому как минимум один аргумент должен отличаться
    // Опять же, если в файле теперь функция, то не понимаю зачем нужно было выносить её из файла renderElements.php?
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/menu.php';
    menu($menuNav, 'sort', SORT_ASC);
    ?>
</div>
