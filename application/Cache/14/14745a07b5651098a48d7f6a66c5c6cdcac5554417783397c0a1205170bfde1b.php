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

/* main/list.twig */
class __TwigTemplate_3593b0e0b0909b5e0f4efb76e049b63dc82def98574ac5e17660a64a4f2d0679 extends Template
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
            echo "    <li class=\"list-group-item d-flex justify-content-between lh-condensed\">
        <div class=\"col-md-2 text-center\">
            <p class=\"my-0\">";
            // line 4
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "name", [], "any", false, false, false, 4), "html", null, true);
            echo "</p>
        </div>
        <div class=\"col-md-3 text-center\">
            <p class=\"my-0\">";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "email", [], "any", false, false, false, 7), "html", null, true);
            echo "</p>
        </div>
        <div class=\"col-md-4 text-center\">
            <p class=\"my-0\">";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "task", [], "any", false, false, false, 10), "html", null, true);
            echo "</p>
        </div>
        <div class=\"col-md-2 text-center\">
            <p class=\"my-0\">
                ";
            // line 14
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["task"], "status", [], "any", false, false, false, 14), 1))) {
                // line 15
                echo "                    <i class=\"fa fa-check color-green\" aria-hidden=\"true\"></i>
                ";
            } else {
                // line 17
                echo "                    <i class=\"fa fa-minus-circle\" aria-hidden=\"true\"></i>
                ";
            }
            // line 19
            echo "
                ";
            // line 20
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["task"], "check_admin", [], "any", false, false, false, 20), 1))) {
                // line 21
                echo "                    <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>
                ";
            }
            // line 23
            echo "            </p>
        </div>
        <div class=\"col-md-1 text-center\">
            <p class=\"my-0\">
                ";
            // line 27
            if ((0 === twig_compare(($context["adm"] ?? null), 1))) {
                // line 28
                echo "                    <a href=\"/add/edit/?id=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 28), "html", null, true);
                echo "\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></a>
                ";
            }
            // line 30
            echo "            </p>
        </div>
    </li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "
";
    }

    public function getTemplateName()
    {
        return "main/list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 34,  97 => 30,  91 => 28,  89 => 27,  83 => 23,  79 => 21,  77 => 20,  74 => 19,  70 => 17,  66 => 15,  64 => 14,  57 => 10,  51 => 7,  45 => 4,  41 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main/list.twig", "E:\\Programs\\OpenServer\\domains\\mvc2\\application\\Views\\main\\list.twig");
    }
}
