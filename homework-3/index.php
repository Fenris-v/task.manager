<?php require_once __DIR__ . '/templates/header.php'; ?>

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
                        for ($i = 0; $i < count($menuAuth); $i++) {
                            if ($i === 0) {
                                echo "<li  class='project-folders-v-active'><a href='#'>$menuAuth[$i]</a></li>";
                            } else {
                                echo "<li><a href='#'>$menuAuth[$i]</a></li>";
                            }
                        }
                        ?>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="index-auth">
                    <?php if ($success) {
                        require __DIR__ . '/include/success.php';
                    } elseif (isset($_GET['login']) && $_GET['login'] == 'yes') { ?>
                        <?= isset($_POST['login']) ? '<p style="color: red;"><b>Неверный логин или пароль</b></p>' : ''; ?>
                        <!--У меня не в корне лежит данный файл, поэтому путь такой-->
                        <form action="/homework-3/index.php?login=yes" method="post">
                            <table width="100% " border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="iat">
                                        <label for="login_id"><?= $loginLabel ?></label>
                                        <input id="login_id" size="30" name="login"
                                               value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="iat">
                                        <label for="password_id"><?= $passwordLabel ?></label>
                                        <input id="password_id" size="30" name="password" type="password"
                                               value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input name="send" type="submit" value="Войти"></td>
                                </tr>
                            </table>
                        </form>
                    <?php } ?>
                </div>

            </td>
        </tr>
    </table>

<?php require_once __DIR__ . '/templates/footer.php';