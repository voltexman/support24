<?php

/*
 * Роутинг Бэкенда
 */
$app->get('/superuser', function ($request, $response, $args) {

    return $this->view->render($response, '@backend/pages/main.twig');
});


$app->get('/superuser/services', function ($request, $response, $args) {

    new backend\controllers\ServicesController();

    return $this->view->render($response, '@backend/pages/services/list.twig');
});


/*
 * Роутинг Фронтенда
 */


$app->get('/', function ($request, $response, $args) {

    return $this->view->render($response, '@frontend/pages/main.twig');
});


$app->get('/about', function ($request, $response, $args) {

    $model = new \frontend\models\About();

    $about = $model->getData();

    return $this->view->render($response, '@frontend/pages/about.twig', ['about' => $about]);
});


$app->get('/service/{alias}', function ($request, $response, $args) {

    $model = new \frontend\models\Services();

    $list = $model->getServicesList();

    $service = $model->getServiceData($args['alias']);

    return $this->view->render($response, '@frontend/pages/service.twig', ['list' => $list, 'service' => $service]);
});


$app->post('/ajax/subscribe', '\frontend\models\Ajax:subscribe');