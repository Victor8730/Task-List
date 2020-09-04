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
                echo "                    <i class=\"fa fa-check color-green px-1 pointer\" aria-hidden=\"true\" data-toggle=\"tooltip\"
                       data-placement=\"top\"
                       title=\"Task complete\"></i>
                ";
            } else {
                // line 19
                echo "                    <i class=\"fa fa-minus-circle px-1 pointer\" aria-hidden=\"true\" data-toggle=\"tooltip\"
                       data-placement=\"top\"
                       title=\"Task in progress\"></i>
                ";
            }
            // line 23
            echo "
                ";
            // line 24
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["task"], "check_admin", [], "any", false, false, false, 24), 1))) {
                // line 25
                echo "                    <i class=\"fa fa-pencil px-1 pointer\" aria-hidden=\"true\" data-toggle=\"tooltip\" data-placement=\"top\"
                       title=\"Task updated by admin\"></i>
                ";
            }
            // line 28
            echo "            </p>
        </div>
        <div class=\"col-md-1 text-center\">
            <p class=\"my-0\">
                ";
            // line 32
            if ((0 === twig_compare(($context["adm"] ?? null), 1))) {
                // line 33
                echo "                    <a href=\"/add/edit/?id=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 33), "html", null, true);
                echo "\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"
                                                             data-toggle=\"tooltip\" data-placement=\"top\"
                                                             title=\"Change task\"></i></a>
                ";
            }
            // line 37
            echo "            </p>
        </div>
    </li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
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
        return array (  113 => 41,  104 => 37,  96 => 33,  94 => 32,  88 => 28,  83 => 25,  81 => 24,  78 => 23,  72 => 19,  66 => 15,  64 => 14,  57 => 10,  51 => 7,  45 => 4,  41 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main/list.twig", "C:\\os\\domains\\mvc2\\application\\Views\\main\\list.twig");
    }
}
