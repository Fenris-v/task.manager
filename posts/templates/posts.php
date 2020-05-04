<?php $messages = database\getMessagesLists($_COOKIE['login']); ?>
    <div class="container">
        <?php
        $canWrite = database\canWriteMsg($_COOKIE['login']);
        database\closeConnect(database\connect());

        if ($canWrite): ?>
            <a class="msg_add" href="/posts/add/">Написать сообщение</a>

            <div class="msg_container">
                <div class="msg_half">
                    <h2>Непрочитанные сообщения</h2>
                    <ul>
                        <?php foreach ($messages as $msg) :
                            if (!(bool)$msg['read']) : ?>
                                <li><a href="/posts/view?msg=<?= $msg['id'] ?>"><?= $msg['title'] ?></a></li>
                            <?php endif;
                        endforeach; ?>
                    </ul>
                </div>

                <div class="msg_half">
                    <h2>Прочитанные сообщения</h2>
                    <ul>
                        <?php foreach ($messages as $msg) :
                            if ((bool)$msg['read']) : ?>
                                <li><a href="/posts/view?msg=<?= $msg['id'] ?>"><?= $msg['title'] ?></a></li>
                            <?php endif;
                        endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php
