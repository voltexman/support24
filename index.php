<?php

ini_set('display_errors',1);

use Slim\Views\Twig;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/common/config/defines.php';
require __DIR__ . '/common/config/settings.php';
require __DIR__ . '/common/config/routes.php';

$app->run();



?>