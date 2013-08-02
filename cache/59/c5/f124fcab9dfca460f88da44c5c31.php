<?php

/* shortener/index.html */
class __TwigTemplate_59c5f124fcab9dfca460f88da44c5c31 extends Twig_Template
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
        $this->env->loadTemplate("header.html")->display($context);
        // line 2
        echo "<div class=\"row\">
  <div class=\"col-lg-6\">
    <div class=\"input-group\">
    <form action=\"http://localhost/estru.me/index.php/shorten\" method=\"POST\">
      <input type=\"text\" class=\"form-control\" id=\"url\">
      <span class=\"input-group-btn\">
        <button class=\"btn btn-default\" type=\"submit\" id=\"sender\">Encurtar!</button>
      </span>
    </form>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
";
        // line 14
        $this->env->loadTemplate("footer.html")->display($context);
    }

    public function getTemplateName()
    {
        return "shortener/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 14,  21 => 2,  19 => 1,);
    }
}
