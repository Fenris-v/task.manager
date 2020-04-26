<?php

use function menu\sortArray;

?>
<ul class="<?= $ulClass ?>">
    <?php
    foreach (sortArray($array, $keyForSort, $typeSort) as $item) : ?>
        <li class="<?= render\isCurrentUrl($item['path']) ? ' active' : '' ?>">
            <a href='<?php if (isset($_SESSION['isAuth']) && $_SESSION['isAuth']) {
                echo $item['path'];
            } else {
                echo '/?login=yes';
            } ?>'><?= render\trimLongTitle($item['title']); ?></a>
        </li>
    <?php endforeach; ?>
</ul>
