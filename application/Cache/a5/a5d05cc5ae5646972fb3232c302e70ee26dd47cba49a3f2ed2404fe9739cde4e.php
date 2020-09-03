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

/* main/card.twig */
class __TwigTemplate_4d055b5ba3d24e6b10b69a4edb0dd75f49b6dbbd33ca3614391729498bfd5b94 extends Template
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
            echo "    <div class=\"card mb-4 shadow-sm\">
        <div class=\"card-header\">
            <h4 class=\"my-0 font-weight-normal\">";
            // line 4
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "name", [], "any", false, false, false, 4), "html", null, true);
            echo "</h4>
            <p><small class=\"text-muted\">";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "email", [], "any", false, false, false, 5), "html", null, true);
            echo "</small></p>
        </div>
        <div class=\"card-body\">
            <p>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "task", [], "any", false, false, false, 8), "html", null, true);
            echo "</p>
        </div>
        <div class=\"card-footer\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    ";
            // line 13
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["task"], "status", [], "any", false, false, false, 13), 1))) {
                // line 14
                echo "                        <i class=\"fa fa-check color-green fa-2x px-1 pointer\" aria-hidden=\"true\" data-toggle=\"tooltip\"
                           data-placement=\"top\"
                           title=\"Task complete\"></i>
                    ";
            } else {
                // line 18
                echo "                        <i class=\"fa fa-minus-circle fa-2x px-1 pointer\" aria-hidden=\"true\" data-toggle=\"tooltip\"
                           data-placement=\"top\"
                           title=\"Task in progress\"></i>
                    ";
            }
            // line 22
            echo "                    ";
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["task"], "check_admin", [], "any", false, false, false, 22), 1))) {
                // line 23
                echo "                        <i class=\"fa fa-pencil fa-2x px-1 pointer\" aria-hidden=\"true\" data-toggle=\"tooltip\"
                           data-placement=\"top\"
                           title=\"Task updated by admin\"></i>
                    ";
            }
            // line 27
            echo "                    ";
            if ((0 === twig_compare(($context["adm"] ?? null), 1))) {
                // line 28
                echo "                        <a href=\"/add/edit/?id=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 28), "html", null, true);
                echo "\"><i class=\"fa fa-pencil-square-o fa-2x px-1 pointer\"
                                                                 aria-hidden=\"true\" data-toggle=\"tooltip\"
                                                                 data-placement=\"top\" title=\"Change task\"></i></a>
                    ";
            }
            // line 32
            echo "                </div>
            </div>
        </div>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "main/card.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 32,  89 => 28,  86 => 27,  80 => 23,  77 => 22,  71 => 18,  65 => 14,  63 => 13,  55 => 8,  49 => 5,  45 => 4,  41 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main/card.twig", "E:\\Programs\\OpenServer\\domains\\mvc2\\application\\Views\\main\\card.twig");
    }
}
