<pre>
<?php

    // Задание 4 - Подсчет суммы элементов массива
    // Создайте массив numbers случайной длины от 3 до 20. Каждое значение - это случайное число от 0 до 10
    // Посчитайте сумму его элементов, стоящих под нечетным индексом.
    // Выведите этот массив, и выведите полученную сумму
    $numbers = [];
    $numbersLength = rand(3, 20);
    for ($i = 0; $i < $numbersLength; $i++)
        $numbers[] = rand(0, 10);

    $sum = 0;
    foreach ($numbers as $key => $num)
        if ($key % 2 !== 0) $sum += $num;

    print_r($numbers);
    echo $sum;

?>
</pre>