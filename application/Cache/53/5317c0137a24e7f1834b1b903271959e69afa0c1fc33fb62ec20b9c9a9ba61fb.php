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

/* main.twig */
class __TwigTemplate_1f231a3b33decc493ba99d4dcb1042fc18683215e4e03330725e4ee4aaefc2fc extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "template.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("template.twig", "main.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"col-md-12 order-md-1 mb-4\">
    <h4 class=\"d-flex justify-content-between align-items-center mb-3\">
        <span>Existing task</span>
        <span class=\"badge badge-secondary badge-pill\">";
        // line 7
        echo twig_escape_filter($this->env, ($context["countDataRows"] ?? null), "html", null, true);
        echo "</span>
    </h4>
    <ul class=\"list-group mb-3 listTask\">
        ";
        // line 10
        $this->loadTemplate("head.twig", "main.twig", 10)->display($context);
        // line 11
        echo "        ";
        $this->loadTemplate("list.twig", "main.twig", 11)->display($context);
        // line 12
        echo "    </ul>
    ";
        // line 13
        $this->loadTemplate("pagination.twig", "main.twig", 13)->display($context);
        // line 14
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 14,  69 => 13,  66 => 12,  63 => 11,  61 => 10,  55 => 7,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main.twig", "E:\\Programs\\OpenServer\\domains\\mvc2\\application\\Views\\main.twig");
    }
}
