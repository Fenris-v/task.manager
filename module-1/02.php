<?php

// 1. Создайте переменную isGood со значением true и создайте переменную smallNumber со значением от 1 до 5
// Предположите какой тип данных и значение будет, если сложить эти переменные
// А теперь сложите их и посмотрите на результат
$isGood = true;
$smallNumber = 3;
var_dump($isGood + $smallNumber);

// 2. В следующем коде есть ошибка: раскомментируйте код и исправьте ее исправьте ее

$firstDay = 'Понедельник';
$secondDay = 'Вторник';
$thirdDay = 'Среда';

var_dump($firstDay . ' ' . $secondDay . ' ' . $thirdDay);


// 3. Создайте переменную $catsCount, в качестве значения укажите любое целое число
// И исправьте ошибку в коде ниже. На странице должно быть выведено сообщение: "Во дворе котов: 3"
$catsCount = 3;
var_dump("Во дворе котов: $catsCount");


// 4. Создайте переменную $currentDate, поместите в нее в виде строки текущую дату в формате ГГГГ-ММ-ДД, например 1971-12-31
// Выведите 1-ю строку: "Шла зима, на двор стоял 1971-12-31 число, скорей бы лето", вместо даты нужно подставить значение переменной
// Выведите 2-ю строку: "Шла зима, на двор стоял $currentDate число, скорей бы лето"
$currentDate = '1971-12-31';
echo "Шла зима, на двор стоял $currentDate число, скорей бы лето";
echo 'Шла зима, на двор стоял $currentDate число, скорей бы лето';

// 5. Исправьте названия переменных, так чтобы было понятно, что это за переменные
$cat = 'Мурзик';
$countFoot = 4;
$countEar = 2;
$tailLong = 27;
$color = 'черного';
$colorFoot = 'белого';
$colorFootNew = 'черного';
$container = 'тазик';
$containerContent = 'с мазутом';

var_dump("Жил был кот по имени $cat");
var_dump("У него было $countFoot лапы, $countEar уха и хвост длинной $tailLong см");
var_dump("Сам он был $color цвета, но лапки были $colorFoot цвета");
var_dump("Однажды он пошел гулять и упал в $where $tmp");
var_dump("Теперь и лапы нашего кота тоже $colorFootNew цвета");

// При создании этого задания ни один котик не пострадал!
