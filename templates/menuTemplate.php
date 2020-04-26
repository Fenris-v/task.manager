<?php

use function menu\sortArray;

?>
<ul class="<?= $ulClass ?>">
    <?php
    foreach (sortArray($array, $keyForSort, $typeSort) as $item) : ?>
        <li class="<?= render\isCurrentUrl($item['path']) ? ' active' : '' ?>">
            <a href='<?= $item['path'] ?>'><?= render\trimLongTitle($item['title']) ?></a>
        </li>
    <?php endforeach; ?>
</ul>
