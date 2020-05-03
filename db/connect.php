<?php

namespace database;

use mysqli;

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
function closeConnect($connect): void
{
    mysqli_close($connect);
}

/**
 * Get all messages for the user
 * @param $login - login of the user
 * @return array - list of messages
 */
function getMessagesLists($login): array
{
    $result = mysqli_query(
        connect(),
        "SELECT activity, title, `read`, messages.id AS id FROM users
LEFT JOIN messages ON recipient_id=users.id
WHERE login='$login'"
    );

    if (mysqli_num_rows($result) > 0) {
        return $messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    return [];
}

/**
 * Get the message
 * @param $id - id of the message
 * @return array - data of the message
 */
function getMessage($id): array
{
    $result = mysqli_query(
        connect(),
        "SELECT title, m.date, text, CONCAT(s.name, ': ', s.email) AS sender FROM users AS u
LEFT JOIN messages AS m ON recipient_id = u.id
LEFT JOIN users AS s ON s.id = sender_id
WHERE m.id=$id"
    );

    if (mysqli_num_rows($result) > 0) {
        return $msg = mysqli_fetch_assoc($result);
    }

    return [];
}

/**
 * Change status on 'read' after open a message
 * @param $id - id of the message
 */
function updateMessageStatus($id): void
{
    mysqli_query(connect(), "UPDATE messages SET messages.read=true WHERE id=$id");
}

/**
 * Get available recipients of the message
 * @param $sender - who send the message
 * @return array - available recipients
 */
function getRecipients($sender): array
{
    $result = mysqli_query(
        connect(),
        "SELECT name, id FROM users WHERE login!='$sender' && activity=true"
    );

    if (mysqli_num_rows($result) > 0) {
        return $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    return [];
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

    if (mysqli_num_rows($result) > 0) {
        return $sections = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return [];
}

/**
 * Can the user write messages
 * @param $login - login of the user
 * @return bool - can write
 */
function canWriteMsg($login): bool
{
    $result = mysqli_query(
        connect(),
        "SELECT group_id FROM users
LEFT JOIN user_group ON user_id=id && group_id=2
WHERE login='$login'"
    );
    if (mysqli_num_rows($result) > 0) {
        return (bool)mysqli_fetch_assoc($result)['activity'];
    }
    return false;
}
