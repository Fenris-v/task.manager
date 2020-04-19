<?php

error_reporting(E_ALL);

$result2 = [
    'authors' => [
        [
            'authorName' => 'Stephen King',
            'email' => 'king@mail.com'
        ],
        [
            'authorName' => 'Douglas Adams',
            'email' => 'adams@mail.com'
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
echo '<pre>';
print_r($result2);
echo '</pre>';
