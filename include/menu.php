<?php

namespace menu;

/**
 * Function for sort array
 * @param array $array - for sort
 * @param string $keyForSort - name of key for sort
 * @param int $typeSort - type of sort
 * @return array after sort
 */
function sortArray(array $array, string $keyForSort, int $typeSort = SORT_ASC): array
{
    $value = array_column($array, $keyForSort);
    array_multisort($value, $typeSort, $array);
    return $array;
}

/**
 * Function for create menu
 * @param array $array - with menu items
 * @param string $keyForSort - name of key for sort
 * @param int $typeSort - type of sort
 * @param string $ulClass - class for ul of menu
 */
function showMenu(array $array, string $keyForSort, int $typeSort = SORT_ASC, string $ulClass = '')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/menuTemplate.php';
}
