<ul class="<?= $ulClass ?>">
    <?php
    foreach ($array as $item) : ?>
        <li class="<?= render\isCurrentUrl($item['path']) ? ' active' : '' ?>">
            <a href='<?= $item['path'] ?>'><?= render\trimLongTitle($item['title']) ?></a>
        </li>
    <?php endforeach; ?>
</ul>
