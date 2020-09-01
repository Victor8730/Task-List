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

/* head.twig */
class __TwigTemplate_a6ce32d681a2d2228d2245fbc2430f299026c43da9b105cb10bdc501bf7ba892 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'listhead' => [$this, 'block_listhead'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $this->displayBlock('listhead', $context, $blocks);
    }

    public function block_listhead($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "<li class=\"list-group-item d-flex justify-content-between lh-condensed\">
    <div class=\"col-md-2 text-center\">
        <h6 class=\"my-0 d-inline-block\" >Name</h6>
        <a href=\"/main/index?sort=name&order=ASC&start=";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["url"] ?? null), "filter", [], "any", false, false, false, 5), "start", [], "any", false, false, false, 5), "html", null, true);
        echo "\"><i class=\"fa fa-arrow-up\" aria-hidden=\"true\"></i></a>
        <a href=\"/main/index?sort=name&order=DESC&start=";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["url"] ?? null), "filter", [], "any", false, false, false, 6), "start", [], "any", false, false, false, 6), "html", null, true);
        echo "\"><i class=\"fa fa-arrow-down\" aria-hidden=\"true\"></i></a>
    </div>
    <div class=\"col-md-3 text-center\">
        <h6 class=\"my-0 d-inline-block\">Email</h6>
        <a href=\"/main/index?sort=email&order=ASC&start=";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["url"] ?? null), "filter", [], "any", false, false, false, 10), "start", [], "any", false, false, false, 10), "html", null, true);
        echo "\"><i class=\"fa fa-arrow-up\" aria-hidden=\"true\"></i></a>
        <a href=\"/main/index?sort=email&order=DESC&start=";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["url"] ?? null), "filter", [], "any", false, false, false, 11), "start", [], "any", false, false, false, 11), "html", null, true);
        echo "\"><i class=\"fa fa-arrow-down\" aria-hidden=\"true\"></i></a>
    </div>
    <div class=\"col-md-4 text-center\">
        <h6 class=\"my-0\">Text task</h6>
    </div>
    <div class=\"col-md-2 text-center\">
        <h6 class=\"my-0 d-inline-block\">Status</h6>
        <a href=\"/main/index?sort=status&order=ASC&start=";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["url"] ?? null), "filter", [], "any", false, false, false, 18), "start", [], "any", false, false, false, 18), "html", null, true);
        echo "\"><i class=\"fa fa-arrow-up\" aria-hidden=\"true\"></i></a>
        <a href=\"/main/index?sort=status&order=DESC&start=";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["url"] ?? null), "filter", [], "any", false, false, false, 19), "start", [], "any", false, false, false, 19), "html", null, true);
        echo "\"><i class=\"fa fa-arrow-down\" aria-hidden=\"true\"></i></a>
    </div>
    <div class=\"col-md-1 text-center\">
        <h6 class=\"my-0\"></h6>
    </div>
</li>
";
    }

    public function getTemplateName()
    {
        return "head.twig";
    }

    public function getDebugInfo()
    {
        return array (  79 => 19,  75 => 18,  65 => 11,  61 => 10,  54 => 6,  50 => 5,  45 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "head.twig", "E:\\Programs\\OpenServer\\domains\\mvc2\\application\\Views\\head.twig");
    }
}
