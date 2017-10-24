<?php
return [
    'project' => [
        'name' => 'Cafe Wilhelm Sieben',
        'email' => 'kontakt@cafewilhelmsieben.de',
        'namespace' => 'Project'
    ],
    'template' => [
        'name' => 'cafe',
        'dir' =>  '/cafe',
        'cacheDir' => '/cache'
    ],
    /*'database' => [
        'host' => 'localhost',
        'user' => 'web28634274',
        'password' => 'q3qKQMpf',
        'database' => 'usr_web28634274_1'
    ],*/
    'database' => [
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'database' => 'cafe'
    ],
    'controller' => [
        'namespace' => 'Controller'
    ],
    'route' => [
        'index' => [
            'controller' => 'IndexController',
            'action' => 'indexAction'
        ],
        'notfound' => [
            'controller' => 'DefaultController',
            'action' => 'notFoundAction'
        ],
        'news' => [
            'controller' => 'IndexController',
            'action' => 'newsPageAction'
        ],
        'philosophie' => [
            'controller' => 'IndexController',
            'action' => 'philosophieAction'
        ],
        'anfahrt' => [
            'controller' => 'IndexController',
            'action' => 'anfahrtAction'
        ],
        'impressum' => [
            'controller' => 'IndexController',
            'action' => 'impressumAction'
        ],
        'archive' => [
            'controller' => 'IndexController',
            'action' => 'archiveAction'
        ],
        'reservierung' => [
            'controller' => 'IndexController',
            'action' => 'reservierungAction'
        ],
        'reservierung-add' => [
            'controller' => 'IndexController',
            'action' => 'reservierungAddAction'
        ],
        'login-redirect' => [
            'controller' => 'IndexController',
            'action' => 'loginRedirectAction'
        ],
        'login' => [
            'controller' => 'IndexController',
            'action' => 'loginAction'
        ],
        'galerie' => [
            'controller' => 'IndexController',
            'action' => 'galerieAction'
        ],
        'loggedin' => [
            'controller' => 'BackendController',
            'action' => 'loggedinAction'
        ],
        'logout' => [
            'controller' => 'BackendController',
            'action' => 'logoutAction'
        ],
        'news-edit' => [
            'controller' => 'BackendController',
            'action' => 'newsEditAction'
        ],
        'news-edit-save' => [
            'controller' => 'BackendController',
            'action' => 'newsEditSaveAction'
        ],
        'news-delete' => [
            'controller' => 'BackendController',
            'action' => 'newsDeleteAction'
        ],
        'event-edit' => [
            'controller' => 'BackendController',
            'action' => 'eventEditAction'
        ],
        'event-edit-save' => [
            'controller' => 'BackendController',
            'action' => 'eventEditSaveAction'
        ],
        'event-delete' => [
            'controller' => 'BackendController',
            'action' => 'eventDeleteAction'
        ],
    ],
    'slider' => [
        '/img/slider/teaser.jpg',
        '/img/slider/teaser2.jpg',
        '/img/slider/teaser3.jpg',
    ],
    'news' => [
        'minNewsShown' => 2,
        'maxAgeOfNewsInDays' => 5,
    ],
    'notification' => [
        'newsInsertSuccess' => 'Die News wurde erfolgreich gespeichert.',
        'newsInsertError' => 'Bei der Erstellung der News gab es einen Fehler',
        'newsEditSuccess' => 'Die News wurde erfolgreich bearbeitet.',
        'newsEditError' => 'Bei der Bearbeitung der News gab es einen Fehler.',
        'newsDeleteSuccess' => 'Die News wurde erfolgreich gelöscht.',
        'newsDeleteError' => 'Die News konnte nicht erfolgreich gelöscht werden.',
        'eventInsertSuccess' => 'Das Event wurde erfolgreich gespeichert.',
        'eventInsertError' => 'Bei der Erstellung des Event gab es einen Fehler',
        'eventEditSuccess' => 'Das Event wurde erfolgreich bearbeitet.',
        'eventEditError' => 'Bei der Bearbeitung des Event gab es einen Fehler.',
        'eventDeleteSuccess' => 'Das Event wurde erfolgreich gelöscht.',
        'eventDeleteError' => 'Das Event konnte nicht erfolgreich gelöscht werden.',
        'loginError' => 'Die eingegebenen Daten sind falsch.',
    ],
];