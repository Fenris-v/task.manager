<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
$result = mysqli_query(
    database\connect(),
    "SELECT name FROM users"
);

$users = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row['name'];
    }
}

$result = mysqli_query(
    database\connect(),
    "SELECT name, color FROM section"
);

$sections = [];
$colors = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sections[] = $row['name'];
        $colors[] = $row['color'];
    }
} ?>
    <div class="container">
        <form method="post" action="/posts/add/sentMessage.php">
            <ul class="msg_form">
                <li>
                    <label>Заголовок
                        <input name="title" type="text" required>
                    </label>
                </li>
                <li>
                    <label>Получатель
                        <select name="recipient" required>
                            <?php foreach ($users as $user) : ?>
                                <option><?= $user ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </li>
                <li>
                    <label>Раздел сообщения
                        <select name="section" required>
                            <?php for ($i = 0; $i < count($sections); $i++) : ?>
                                <option style="background: <?= $colors[$i] ?>"><?= $sections[$i] ?></option>
                            <?php endfor; ?>
                        </select>
                    </label>
                </li>
                <li>
                    <label>Текст сообщения
                        <textarea name="text" required></textarea>
                    </label>
                </li>
                <li>
                    <input type="submit" value="Отправить">
                </li>
            </ul>
        </form>
    </div>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
