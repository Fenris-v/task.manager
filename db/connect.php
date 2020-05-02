<?php

namespace database;

function connect() {
    $dbName = 'task_db';
    $user = 'root';
    $password = 'pass123';
    $host = 'localhost';

    static $connect = null;

    if (null === $connect) {
        $connect = mysqli_connect($host, $user, $password, $dbName);
        if (!$connect) {
            echo 'Код ошибки errno: ' . mysqli_connect_errno();
            exit;
        }
    }

    return $connect;
}

function closeConnect($connect) {
    mysqli_close($connect);
}
