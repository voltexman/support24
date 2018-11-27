<?php

// --------------------------
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$config = new \Slim\Container($configuration);
// --------------------------


$app = new Slim\App($config);

$container = $app->getContainer();

$container['pdo'] = function ($c) {
    $settings = $c->get('settings')['db'];
    $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'],
        $settings['user'], $settings['pass']);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $pdo;
};

$container['view'] = function ($c) {
    $view = new Slim\Views\Twig(['backend/views'=>'backend', 'frontend/views'=>'frontend']);

    $view->getLoader()->addPath('backend/views', 'backend');
    $view->getLoader()->addPath('frontend/views', 'frontend');

    return $view;
};
