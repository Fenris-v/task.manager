<?php

require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
?>
    <div class="container">
        <form method="post" action="#">
            <ul class="msg_form">
                <li>
                    <label>Заголовок
                        <input name="title" type="text">
                    </label>
                </li>
                <li>
                    <label>Получатель
                        <select name="recipient">
                            <option>user</option>
                        </select>
                    </label>
                </li>
                <li>
                    <label>Раздел сообщения
                        <select name="section">
                            <option>section</option>
                        </select>
                    </label>
                </li>
                <li>
                    <label>Текст сообщения
                        <textarea name="title"></textarea>
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
