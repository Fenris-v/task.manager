<?php

namespace database;

use mysqli;
use mysqli_result;

/**
 * Create connection with database
 * @return mysqli - connection with database
 */
function connect(): mysqli
{
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

/**
 * Close connection with database
 * @param $connect - connection with database
 */
function closeConnect(mysqli $connect): void
{
    mysqli_close($connect);
}

/**
 * Get all messages for the user
 * @param $login - login of the user
 * @return array - list of messages
 */
function getMessagesLists(string $login): array
{
    $login = mysqli_real_escape_string(connect(), $login);
    $result = mysqli_query(
        connect(),
        "SELECT activity, title, `read`, messages.id AS id FROM users
LEFT JOIN messages ON recipient_id=users.id
WHERE login='$login'"
    );

    return getResult($result);
}

/**
 * Get the message
 * @param $id - id of the message
 * @return array - data of the message
 */
function getMessage(int $id): array
{
    $id = mysqli_real_escape_string(connect(), $id);
    $result = mysqli_query(
        connect(),
        "SELECT title, m.date, text, CONCAT(s.name, ': ', s.email) AS sender FROM users AS u
LEFT JOIN messages AS m ON recipient_id = u.id
LEFT JOIN users AS s ON s.id = sender_id
WHERE m.id=$id"
    );

    return getResult($result);
}

/**
 * Change status on 'read' after open a message
 * @param $id - id of the message
 */
function updateMessageStatus(int $id): void
{
    $id = mysqli_real_escape_string(connect(), $id);
    mysqli_query(connect(), "UPDATE messages SET messages.read=true WHERE id=$id");
}

/**
 * Get available recipients of the message
 * @param $sender - who send the message
 * @return array - available recipients
 */
function getRecipients(string $sender): array
{
    $sender = mysqli_real_escape_string(connect(), $sender);
    $result = mysqli_query(
        connect(),
        "SELECT name, id FROM users WHERE login!='$sender' && activity=true"
    );

    return getResult($result);
}

/**
 * Get available sections of messages
 * @return array - available sections of messages
 */
function getMessagesSections(): array
{
    $result = mysqli_query(
        connect(),
        "SELECT id, s.name, code AS color FROM section AS s
LEFT JOIN colors AS c ON c.name=s.color"
    );

    return getResult($result);
}

/**
 * Can the user write messages
 * @param $login - login of the user
 * @param $showMsg - show msg if not result
 * @return bool - can write
 */
function canWriteMsg(string $login, bool $showMsg = true): bool
{
    $isActive = false;
    $login = mysqli_real_escape_string(connect(), $login);
    $result = mysqli_query(
        connect(),
        "SELECT group_id FROM users
LEFT JOIN user_group ON user_id=id && group_id=2
WHERE login='$login'"
    );

    if (mysqli_num_rows($result) > 0) {
        $isActive = (int)mysqli_fetch_assoc($result)['group_id'] === 2;
    }

    if ($showMsg && !$isActive) {
        include $_SERVER['DOCUMENT_ROOT'] . '/posts/templates/notActive.html';
    }

    return $isActive;
}

/**
 * Ges user data
 * @param $login - login of the
 * @return array - user data
 */
function getUserData(string $login): array
{
    $login = mysqli_real_escape_string(connect(), $login);
    $result = mysqli_query(
        connect(),
        "SELECT u.name AS user_name, u.email, u.activity, u.phone, u.notification, 
       GROUP_CONCAT(g.name SEPARATOR ', ') AS group_name
FROM users AS u
LEFT JOIN user_group AS ug ON ug.user_id=u.id
LEFT JOIN `groups` AS g ON g.id=ug.group_id
WHERE u.login='$login'"
    );

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return [];
}

/**
 * Parse result of mysqli_query
 * @param mysqli_result $result - result of mysqli_query
 * @return array - array with data
 */
function getResult(mysqli_result $result): array
{
    if (mysqli_num_rows($result) === 1) {
        return mysqli_fetch_assoc($result);
    } elseif (mysqli_num_rows($result) > 1) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return [];
}
