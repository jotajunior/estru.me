<?php

/* shortener/result.html */
class __TwigTemplate_800c1d73a892c3d549395b3921f2a8ff extends Twig_Template
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
      <input type=\"text\" class=\"form-control\" id=\"result\" value=\"http://estru.me/";
        // line 5
        if (isset($context["shortened"])) { $_shortened_ = $context["shortened"]; } else { $_shortened_ = null; }
        echo twig_escape_filter($this->env, $_shortened_, "html", null, true);
        echo "\">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
";
        // line 9
        $this->env->loadTemplate("footer.html")->display($context);
    }

    public function getTemplateName()
    {
        return "shortener/result.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 9,  26 => 5,  21 => 2,  19 => 1,);
    }
}
