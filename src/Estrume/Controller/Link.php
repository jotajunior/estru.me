<?php
namespace Estrume\Controller;

use Estrume\Model as Model;
use Estrume\Config as Config;

class Link
{
	private $model;

	public function __construct()
	{
		$this->model = new Model\Link();

		$this->loader = new \Twig_Loader_Filesystem(Config\Path::template);
		$this->view = new \Twig_Environment($this->loader, array('cache' => Config\Path::cache, 'debug'=>true));
	}
	
	public function index()
	{
		echo $this->view->render("shortener/index.html", array());
	}
	
	public function shorten()
	{
		$url = $_POST['url'];
		$shortened = $this->model->shorten($url);
		echo $this->view->render("shortener/result.html", array("shortened" => $shortened));
	}
	
	public function redirect($code)
	{
		$url = $this->model->getOriginal($code);
		echo $this->view->render("redirect/index.html", array("url" => $url));
	}
	
	public function about()
	{
		echo $this->view->render("about/index.html", array());
	}
}