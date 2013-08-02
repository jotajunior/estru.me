<?php

/* footer.html */
class __TwigTemplate_e05f65a32499b55775a05fad765a315a extends Twig_Template
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
        echo "    <!-- JavaScript plugins (requires jQuery) -->
    <script src=\"http://code.jquery.com/jquery.js\"></script>
\t<!-- Latest compiled and minified CSS -->
\t<link rel=\"stylesheet\" href=\"//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css\">
 
\t<!-- Latest compiled and minified JavaScript -->
\t<script src=\"//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js\"></script>
  </body>
</html>";
    }

    public function getTemplateName()
    {
        return "footer.html";
    }

    public function getDebugInfo()
    {
        return array (  33 => 12,  21 => 2,  19 => 1,);
    }
}
