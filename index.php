<?php require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
if (isset($_GET['logout'])) {
    session_destroy();
} ?>

    <table class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">
                <h1><?= render\renderH1($menuNav) ?></h1>
                <p><?= $content ?></p>
            </td>
            <td class="right-collum-index">

                <div class="project-folders-menu">
                    <ul class="project-folders-v">
                        <?php for ($i = 0; $i < count($menuAuth); $i++) : ?>
                            <li class='<?= $i !== 0 ? '' : 'project-folders-v-active'; ?>'>
                                <a href='<?php if ($i === 0 && render\isAuth()) {
                                    echo '/?logout';
                                } elseif ($i === 0) {
                                    echo '?login=yes';
                                } else {
                                    echo '/';
                                } ?>'><?php if ($i === 0 && render\isAuth()) {
                                        echo 'Выйти';
                                    } else {
                                        echo $menuAuth[$i];
                                    } ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="index-auth">
                    <?php if ($isAuth) {
                        require $_SERVER['DOCUMENT_ROOT'] . '/templates/success.php';
                    } elseif (isset($_GET['login']) && $_GET['login'] == 'yes') {
                        if (isset($_POST['login'])) {
                            require $_SERVER['DOCUMENT_ROOT'] . '/templates/error.php';
                        } ?>
                        <form action="/?login=yes" method="post">
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
                                               value="<?= $_POST['password'] ?? '' ?>">
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

<?php require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';

