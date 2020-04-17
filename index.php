<?php
    $title = 'Project - ведение списков';
    $menuNav = ['Главная', 'О нас', 'Контакты', 'Новости', 'Каталог'];
    $h1 = 'Возможности проекта —';
    $content = 'Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с
                друзьями и просматривать списки друзей.';
    $menuFooter = ['Авторизация', 'Регистрация', 'Забыли пароль?'];
    $loginLabel = 'Ваш e-mail:';
    $passwordLabel = 'Ваш пароль:';
    $date = 2018;
    $imageSrc = 'i/logo.png';
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/styles.css" rel="stylesheet">
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
            global $menuNav;
            for ($i = 0; $i < count($menuNav); $i++) {
                echo "<li><a href='#'>$menuNav[$i]</a></li>";
            }
        ?>
    </ul>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">

            <h1><?= $h1 ?></h1>
            <p><?= $content ?></p>


        </td>
        <td class="right-collum-index">

            <div class="project-folders-menu">
                <ul class="project-folders-v">
                    <?php
                        global $menuFooter;
                        for ($i = 0; $i < count($menuFooter); $i++) {
                            if ($i === 0) {
                                echo "<li  class='project-folders-v-active'><a href='#'>$menuFooter[$i]</a></li>";
                            } else {
                                echo "<li><a href='#'>$menuFooter[$i]</a></li>";
                            }
                        }
                    ?>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="index-auth">
                <form action="" method="">
                    <table width="100% " border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="iat">
                                <label for="login_id"><?= $loginLabel ?></label>
                                <input id="login_id" size="30" name="login">
                            </td>
                        </tr>
                        <tr>
                            <td class="iat">
                                <label for="password_id"><?= $passwordLabel ?></label>
                                <input id="password_id" size="30" name="password" type="password">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Войти"></td>
                        </tr>
                    </table>
                </form>
            </div>

        </td>
    </tr>
</table>

<div class="clearfix">
    <ul class="main-menu bottom">
        <?php
            global $menuNav;
            for ($i = 0; $i < count($menuNav); $i++) {
                echo "<li><a href='#'>$menuNav[$i]</a></li>";
            }
        ?>
    </ul>
</div>

<div class="footer">&copy;&nbsp;<nobr> <?= $date ?></nobr>
    Project .
</div>

</body>
</html>