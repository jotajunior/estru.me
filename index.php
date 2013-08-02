<?php
require 'bootstrap.php';
require 'vendor/autoload.php';

use \Estrume\Controller as Controller;

$app = new \Slim\Slim(array("debug"=>true));


$linkController = new Controller\Link();

$app->get('/', function () use ($linkController) {
	$linkController->index();
});

$app->get('/shorten', function () use ($linkController) {
    $linkController->shorten();
});

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->run();
