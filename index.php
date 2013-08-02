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
	if (!empty($url))
	    echo $linkController->shorten($url);
});

$app->get('/:code', function ($code) use ($linkController) {
	$linkController->redirect($code);
});

$app->run();

/*
RewriteEngine On

# Some hosts may require you to use the `RewriteBase` directive.
# If you need to use the `RewriteBase` directive, it should be the
# absolute physical path to the directory that contains this htaccess file.
#
RewriteBase /var/www/vendor/slim/slim/

RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ /index.php [QSA,L]
*/