<?php
session_name('session_id');
session_start();
//phpinfo();
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/data.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/main_menu.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/renderElements.php';
!$isAuth ?: $_SESSION['isAuth'] = true;
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
    <?php menu\showMenu($menuNav, 'sort', SORT_ASC, 'main-menu'); ?>
</div>
