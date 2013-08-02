<?php

/* header.html */
class __TwigTemplate_516f0d7c1fa74194120945320390b4cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <title>estru.me - o encurtador mais sujo da internê</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
\t<style type='text/css'>
\t\tbody { margin: 0px; padding: 0px; }
\t\t.container { margin: 0 auto; padding: 2px; border-radius: 10px; margin-top: 2px; }
\t</style>
\t</head>
  <body onload=\"document.shorten.url.focus();\">
  <div class=\"navbar\">
  <a class=\"navbar-brand\" href=\"#\">estru.me</a>
  <ul class=\"nav navbar-nav\">
    <li class=\"active\"><a href=\"http://estru.me/\">Home</a></li>
    <li><a href=\"#\">Sobre</a></li>
    <li><a href=\"http://github.com/jotajunior/estru.me/\">Colabore (LOL)</a></li>
  </ul>
</div>";
    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
