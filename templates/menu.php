<ul class="main-menu">
    <?php
    foreach ($menuNav as $item) : ?>
        <li class="<?= $_SERVER['REQUEST_URI'] == $item['path'] ? ' active' : '' ?>">
            <a href='<?= $item['path'] ?>'><?= $item['title'] ?></a>
        </li>
    <?php endforeach; ?>
</ul>
<?php
