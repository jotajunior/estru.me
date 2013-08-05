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
\t\t#indexrow { margin-left: 0px; margin-right: 0px; }
\t</style>
\t<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42905089-1', 'estru.me');
  ga('send', 'pageview');

</script>
\t</head>
  <body onload=\"document.shorten.url.focus();\">
  <div class=\"navbar\">
  <a class=\"navbar-brand\" href=\"#\">estru.me</a>
  <ul class=\"nav navbar-nav\">
    <li class=\"active\"><a href=\"http://estru.me/\">Home</a></li>
    <li><a href=\"#\">Sobre</a></li>
    <li><a href=\"http://github.com/jotajunior/estru.me/\">Colabore com esta merda!</a></li>
  </ul>
</div>";
    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function getDebugInfo()
    {
        return array (  39 => 18,  21 => 2,  19 => 1,);
    }
}
