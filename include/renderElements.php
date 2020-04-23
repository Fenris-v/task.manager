<?php

namespace render;

/**
 * Doing sort of array
 * @param array $array for sorting
 * @param string $keyForSort - key for sorting of array
 * @param string $typeSort - asc | desc
 */
function sortArray(&$array, $keyForSort, $typeSort = 'asc')
{
    switch ($typeSort) {
        case 'desc':
            $sort = SORT_DESC;
            break;
        case 'asc':
        default:
            $sort = SORT_ASC;
            break;
    }
    $value = array_column($array, $keyForSort);
    array_multisort($value, $sort, $array);
}

/**
 * Function for the rendering of main menu
 * @param array with menu
 * @param string $class - class for html tag li
 * @param string $typeSort - type of sorting for array
 */
function renderMenu($menu, $class = '', $typeSort = '')
{
    sortArray($menu, 'sort', $typeSort);
    foreach ($menu as $item) : ?>
        <li class="<?= $_SERVER['REQUEST_URI'] == $item['path'] ? $class . ' active' : $class ?>">
            <a href='<?= $item['path'] ?>'><?= $item['title'] ?></a>
        </li>
    <?php endforeach;
}

/**
 * Function for the rendering H1
 * @param array - menu array
 */
function renderH1($menu)
{
//    if (stripos($_SERVER['REQUEST_URI'], '?') !== false) {
//        $uri = stristr($_SERVER['REQUEST_URI'], '?', true);
//    } else {
//        $uri = $_SERVER['REQUEST_URI'];
//    }
    foreach ($menu as $item) {
        if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $item['path']) { ?>
            <h1>
                <?php if (mb_strlen($item['title']) > 15) {
                    echo mb_substr($item['title'], 0, 15) . '...';
                } else {
                    echo $item['title'];
                } ?>
            </h1>
            <?php
        }
    }
}
