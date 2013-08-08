<?php
require 'bootstrap.php';
require 'vendor/autoload.php';

use \Estrume\Controller as Controller;

$app = new \Slim\Slim(array('debug' => false));

$linkController = new Controller\Link();

$app->get('/', function () use ($linkController) {
        $linkController->index();
});

$app->post('/shorten', function () use ($linkController, $app) {
        $url = $app->request()->post('url');
        $ip = $app->request()->getIp();

        $linkController->shorten($url, $ip);
});

$app->get('/:code', function ($code) use ($linkController) {
        $linkController->redirect($code);
});

$app->run();