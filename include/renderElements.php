<?php

namespace render;

/**
 * Doing sort of array
 * @param array $array for sorting
 * @param string $keyForSort - key for sorting of array
 * @param $typeSort - asc | desc
 */
function sortArray(&$array, $keyForSort, $typeSort = SORT_ASC)
{
    $value = array_column($array, $keyForSort);
    array_multisort($value, $typeSort, $array);
}

/**
 * Trim string for 15 chars
 * @param string $title for trim
 * @param int $length count of chars
 * @return string
 */
function trimLongTitle($title, $length = 15): string
{
    return mb_strimwidth($title, 0, $length + 3, '...');
}

/**
 * Function for the rendering H1
 * @param array - menu array
 */
function renderH1($menu)
{
    foreach ($menu as $item) {
        if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $item['path']) { ?>
            <h1>
                <?php if (mb_strlen($item['title']) > 15) {
                    echo trimLongTitle($item['title']);
                } else {
                    echo $item['title'];
                } ?>
            </h1>
            <?php
        }
    }
}
