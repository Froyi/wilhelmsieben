<?php
return [
    'project' => [
        'name' => 'Cafe Wilhelm Sieben',
        'namespace' => 'Project'
    ],
    'template' => [
        'name' => 'cafe',
        'dir' =>  '/cafe',
        'cacheDir' => '/cache'
    ],
    'database' => [
        'host' => 'localhost',
        'user' => 'web28634274',
        'password' => 'q3qKQMpf',
        'database' => 'usr_web28634274_1'
    ],
    /*'database' => [
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'database' => 'cafe'
    ],*/
    'controller' => [
        'namespace' => 'Controller'
    ],
    'route' => [
        'index' => [
            'controller' => 'IndexController',
            'action' => 'indexAction'
        ],
        'notfound' => [
            'controller' => 'BasicController',
            'action' => 'notFoundAction'
        ]
    ]
];