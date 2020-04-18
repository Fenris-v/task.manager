<pre>
<?php

    // Задание 6 - Сортировка массивов
    // Возьмите предыдущую матрицу и отсортируйте четные строки по возрастанию, а нечетные по убыванию, и снова выведите массив в удобном формате
    // (запрещено использовать встроенные в php функции сортировки *sort|asort|ksort|usort*)
    // Пример вывода:
    // 4 1 1 1
    // 2 3 4 6
    // 7 2 2 1
    // 0 0 0 7
    // 7 5 4 0

    $m = rand(3, 10);
    $n = rand(3, 10);
    $matrix = [];
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $matrix[$i][$j] = rand(0, 9);
        }
    }
    foreach ($matrix as $val) {
        echo implode(' ', $val) . '<br />';
    }

    for ($k = 0; $k < count($matrix); $k++) {

        $row = $matrix[$k];

        for ($i = 0; $i < count($row) - 1; $i++) {
            $index = $i;
            for ($j = $i + 1; $j < count($row); $j++) {
                if (($k % 2 == 0 && $row[$index] > $row[$j]) || ($k % 2 != 0 && $row[$index] < $row[$j])) {
                    $index = $j;
                }
            }

            $tmp = $row[$index];
            $row[$index] = $row[$i];
            $row[$i] = $tmp;
        }

        $matrix[$k] = $row;


    }

    echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';

    foreach ($matrix as $val) {
        echo implode(' ', $val) . '<br />';
    }

?>
</pre>