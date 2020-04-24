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
    render\sortArray($menuNav, 'sort', SORT_ASC);
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/menu.php';
    ?>
</div>
