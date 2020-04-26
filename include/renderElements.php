<?php

namespace render;

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
 * @return string - name of page
 */
function renderH1($menu): string
{
    foreach ($menu as $item) {
        if (isCurrentUrl($item['path'])) {
            return $item['title'];
        }
    }
    return 'Default title';
}

/**
 * Check current url
 * @param $url
 * @return bool
 */
function isCurrentUrl($url): bool
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $url;
}
