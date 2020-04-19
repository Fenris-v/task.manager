<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/homework-3/include/data.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/css/styles.css" rel="stylesheet">
    <title><?= $title ?></title>
</head>

<body>

<div class="header">
    <div class="logo"><img src="<?= $imageSrc ?>" width="68" height="23" alt="Project"></div>
    <div class="clearfix"></div>
</div>

<div class="clear">
    <ul class="main-menu">
        <?php
        for ($i = 0; $i < count($menuNav); $i++) {
            echo "<li><a href='#'>$menuNav[$i]</a></li>";
        }
        ?>
    </ul>
</div>