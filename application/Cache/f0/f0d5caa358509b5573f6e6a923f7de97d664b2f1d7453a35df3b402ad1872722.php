<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* main/pagination.twig */
class __TwigTemplate_952cf46fe53d599308e559cc1950e908e86cc0c02de56dfe871deb73ce39f04e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<nav aria-label=\"navigation example text-center\">
    <ul class=\"pagination\">
        ";
        // line 3
        echo ($context["pag"] ?? null);
        echo "
    </ul>
</nav>";
    }

    public function getTemplateName()
    {
        return "main/pagination.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main/pagination.twig", "E:\\Programs\\OpenServer\\domains\\mvc2\\application\\Views\\main\\pagination.twig");
    }
}
