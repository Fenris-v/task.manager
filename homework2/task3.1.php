<?php

error_reporting(E_ALL);

require_once __DIR__ . '/task3.2.php';

$result3 = [
    'authors' => [
        'king@mail.com' => [
            'authorName' => 'Stephen King',
            'email' => 'king@mail.com',
            'year' => 1965
        ],
        'adams@mail.com' => [
            'authorName' => 'Douglas Adams',
            'email' => 'adams@mail.com',
            'year' => 1951
        ]
    ],
    'books' => [
        [
            'bookName' => 'It',
            'authorEmail' => 'king@mail.com'
        ],
        [
            'bookName' => 'Cell',
            'authorEmail' => 'king@mail.com'
        ],
        [
            'bookName' => 'The Hitchhiker\'s Guide to the Galaxy',
            'authorEmail' => 'adams@mail.com'
        ]
    ]
];

renderBooks($result3);

shuffle($result3['books']);

echo '<b>Здесь книги перемешаны:</b> <br />';

renderBooks($result3);
