<div class="container">
    <!--    TODO-->
    <?php $isChecked = true; ?>
    <?php if (!$isChecked): ?>
        <p>Вы сможете отправлять сообщения после прохождения модерации</p>
    <?php else: ?>

        <a class="msg_add" href="/posts/add/">Написать сообщение</a>

        <div class="msg_container">


            <div class="msg_half">
                <ul>
                    <li><a href="#">unread</a></li>
                    <li><a href="#">unread</a></li>
                </ul>
            </div>

            <div class="msg_half">
                <ul>
                    <li><a href="#">read</a></li>
                    <li><a href="#">read</a></li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</div>
