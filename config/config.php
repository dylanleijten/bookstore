<?php

return [
    'database' => [
        'user' => 'root',
        'pass' => '',
        'db'   => 'bookstore',
        'host' => 'localhost'
    ],

    'page' => [
        'defaults' => [
            'folder' => __DIR__ . '/../pages',
            'page'   => 'index',
            'header' => 'header',
            'footer' => 'footer'
        ],
        'key' => 'p'
    ]
];