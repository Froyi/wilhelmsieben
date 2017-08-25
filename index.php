<?php

namespace Project;

define('ROOT_PATH', getcwd());

require ROOT_PATH . '/vendor/autoload.php';

$route = 'index';

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}

$routing = new Routing(new Configuration());
$routing->startRoute($route);