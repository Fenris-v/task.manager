<?php
    
    /**
     * Вывод print_r() для первых 3х заданий закомментирован, чтобы не выводилось лишнее в 4м задании
     * Использовал print_r() вместо var_dump, т.к. в данном случае не нужно столько информации
     */
    
    error_reporting(E_ALL);
    
    $result1 = [
        'author' => [
            'authorName' => '',
            'email' => ''
        ],
        'books' => [
            'bookName' => '',
            'authorEmail' => ''
        ]
    ];
//    print_r($result1);
    
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
//    print_r($result2);
    
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
//    print_r($result3);
    
    $title = 'Book\'s catalog';
    
    $red = (bool) rand(0, 1);
    
    /**
     * В уроке говорилось, что не хорошо создавать одноразовые переменные, которой у меня является $class.
     * Но в данном случае мне либо перезаписывать $red в строку нужно, а про изменение типов тоже говорилось, что плохая практика,
     * либо писать конструкцию if на 3 строки в html, что ухудшит читабельность.
     *
     * Тернарный оператор в рамках html в данной ситуации я не знаю как использовать.
     * Буду рад совету, как лучше сделать :)
     */
    $class = $red ? 'red' : '';
    