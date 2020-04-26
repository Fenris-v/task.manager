<?php

function menu($array, $keyForSort, $typeSort = SORT_ASC, $ulClass = '')
{
    $value = array_column($array, $keyForSort);
    array_multisort($value, $typeSort, $array);
    ?>
    <ul class="ulClass">
        <?php
        foreach ($array as $item) : ?>
            <li class="<?= render\isCurrentUrl($item['path']) ? ' active' : '' ?>">
                <a href='<?= $item['path'] ?>'><?= render\trimLongTitle($item['title']) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
}

?>
<ul class="main-menu">
        <?php
        foreach ($array as $item) : ?>
            <li class="<?= render\isCurrentUrl($item['path']) ? ' active' : '' ?>">
                <a href='<?= $item['path'] ?>'><?= render\trimLongTitle($item['title']) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
