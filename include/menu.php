<?php
namespace menu;

function sortArray(&$array, $keyForSort, $typeSort = SORT_ASC)
{
    $value = array_column($array, $keyForSort);
    array_multisort($value, $typeSort, $array);
}

function showMenu($array, $keyForSort, $typeSort = SORT_ASC, $ulClass = '')
{
    sortArray($array, $keyForSort, $typeSort);
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/menuTemplate.php';
}
