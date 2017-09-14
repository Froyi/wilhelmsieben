<?php

namespace Project;

use Project\Utilities\Tools;

define('ROOT_PATH', getcwd());

require ROOT_PATH . '/vendor/autoload.php';

$route = 'index';

if (Tools::getValue('route') !== false) {
    $route = Tools::getValue('route') ;
}

$routing = new Routing(new Configuration());
$routing->startRoute($route);
