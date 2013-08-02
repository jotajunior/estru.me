<?php
require 'bootstrap.php';
require 'vendor/autoload.php';

use \Estrume\Controller as Controller;

$app = new \Slim\Slim(array("debug"=>true));

$linkController = new Controller\Link();

$app->get('/', function () use ($linkController) {
	$linkController->index();
});

$app->post('/shorten', function () use ($linkController, $app) {
	$url = $app->request()->post('url');
    echo $linkController->shorten($url);
});

$app->get('/:code', function ($code) use ($linkController) {
	$linkController->redirect($code);
});

$app->run();