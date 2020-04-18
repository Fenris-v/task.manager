<pre>
<?php

    // Задание 2 - Перестановка букв в слове (циклический сдвиг влево)
    // Дано слово (поместите любой текст в переменную word), нужно взять первую букву в слове и поставить ее в конец.
    $word = 'hello world';
    echo $word . '<br />';

    //    $array = str_split($word);
    //    array_push($array, $array[0]);
    //    array_shift($array);
    //    $word = implode($array);
    //    echo $word;

    $word = substr($word, 1, strlen($word) - 1) . substr($word, 0, 1);
    echo $word;

?>
</pre>