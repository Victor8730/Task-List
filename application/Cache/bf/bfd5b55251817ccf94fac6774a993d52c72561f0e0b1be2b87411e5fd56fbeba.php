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

/* list.twig */
class __TwigTemplate_17950d263e1bb5c08b9705c1d8aaeeef2f5243c661f599c382e70b08a39eda51 extends Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dataList"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 2
            echo "
    <li class=\"list-group-item d-flex justify-content-between lh-condensed\">
        <div class=\"col-md-2 text-center\">
            <p class=\"my-0\">";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "name", [], "any", false, false, false, 5), "html", null, true);
            echo "</p>
        </div>
        <div class=\"col-md-3 text-center\">
            <p class=\"my-0\">";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "email", [], "any", false, false, false, 8), "html", null, true);
            echo "</p>
        </div>
        <div class=\"col-md-4 text-center\">
            <p class=\"my-0\">";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "task", [], "any", false, false, false, 11), "html", null, true);
            echo "</p>
        </div>
        <div class=\"col-md-2 text-center\">
            <p class=\"my-0\">
                ";
            // line 15
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["task"], "status", [], "any", false, false, false, 15), 1))) {
                // line 16
                echo "                    <i class=\"fa fa-check color-green\" aria-hidden=\"true\"></i>
                ";
            } else {
                // line 18
                echo "                    <i class=\"fa fa-minus-circle\" aria-hidden=\"true\"></i>
                ";
            }
            // line 20
            echo "
                ";
            // line 21
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["task"], "check", [], "any", false, false, false, 21), 1))) {
                // line 22
                echo "                    <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>
                ";
            }
            // line 24
            echo "            </p>
        </div>
        <div class=\"col-md-1 text-center\">
            <p class=\"my-0\">
                ";
            // line 28
            if ((0 === twig_compare(($context["adm"] ?? null), 1))) {
                // line 29
                echo "                    <a href=\"/add/edit/?id=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 29), "html", null, true);
                echo "\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></a>
                ";
            }
            // line 31
            echo "            </p>
        </div>
    </li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "
";
    }

    public function getTemplateName()
    {
        return "list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 35,  98 => 31,  92 => 29,  90 => 28,  84 => 24,  80 => 22,  78 => 21,  75 => 20,  71 => 18,  67 => 16,  65 => 15,  58 => 11,  52 => 8,  46 => 5,  41 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "list.twig", "E:\\Programs\\OpenServer\\domains\\mvc2\\application\\Views\\list.twig");
    }
}
