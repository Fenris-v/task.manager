<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/homework-3/templates/header.php'; ?>

    <table class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">
                <h1><?= $h1 ?></h1>
                <p><?= $content ?></p>
            </td>
            <td class="right-collum-index">

                <div class="project-folders-menu">
                    <ul class="project-folders-v">
                        <?php for ($i = 0; $i < count($menuAuth); $i++) {
                            if ($i === 0) { ?>
                                <li class='project-folders-v-active'><a href='#'><?= $menuAuth[$i] ?></a></li>
                            <?php } else { ?>
                                <li><a href='#'><?= $menuAuth[$i] ?></a></li>
                            <?php }
                        }
                        ?>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="index-auth">
                    <?php if ($isAuth) {
                        require $_SERVER['DOCUMENT_ROOT'] . '/homework-3/templates/success.php';
                    } elseif (isset($_GET['login']) && $_GET['login'] == 'yes') { ?>
                        <?php !isset($_POST['login']) ?: require_once $_SERVER['DOCUMENT_ROOT'] . '/homework-3/templates/error.php'; ?>
                        <!--У меня не в корне лежит данный файл, поэтому путь такой-->
                        <form action="/homework-3/index.php?login=yes" method="post">
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="iat">
                                        <label for="login_id"><?= $loginLabel ?></label>
                                        <input id="login_id" size="30" name="login"
                                               value="<?= $_POST['login'] ?? '' ?>">
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

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/homework-3/templates/footer.php';