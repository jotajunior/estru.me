<?php
namespace Estrume\Controller;

use Estrume\Model as Model;
use Estrume\Config as Config;

class Link
{
        private $model;
        private $loader;
        private $view;

        public function __construct()
        {
                $this->model = new Model\Link();
                $this->loader = new \Twig_Loader_Filesystem(Config\Path::template);
                $this->view = new \Twig_Environment($this->loader, array('cache' => Config\Path::cache, 'debug' => false));
        }

		public function __call($method, $arguments)
		{
			try
			{
				call_user_func_array(array($this, $method), $arguments);
			} catch (\Exception $exception) {
				echo $exception->getMessage() . PHP_EOL;
			}
		}

        protected function index()
        {
                echo $this->view->render("shortener/index.html");
        }

        protected function shorten($url, $ip)
        {
                $shortened = $this->model->shorten($url, $ip);
            	echo $this->view->render("shortener/result.html", array("shortened" => $shortened));
        }

        protected function redirect($code)
        {
                $url = $this->model->getOriginal($code);
                echo $this->view->render("redirect/index.html", array("url" => $url));
        }

        protected function about()
        {
                echo $this->view->render("about/index.html");
        }
}