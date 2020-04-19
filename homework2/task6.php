<?php
error_reporting(E_ALL);

$studentsCount = rand(1, 1000000);
if (
    $studentsCount % 10 == 0 ||
    $studentsCount % 10 >= 5 && $studentsCount % 10 <= 9 ||
    $studentsCount % 100 >= 11 && $studentsCount % 100 <= 19
) {
    echo "на учебе $studentsCount студентов";
} elseif ($studentsCount % 10 == 1) {
    echo "на учебе $studentsCount студент";
} else {
    echo "на учебе $studentsCount студента";
}

