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
            echo "<div class=\"card mb-4 shadow-sm\">
    <div class=\"card-header\">
        <h4 class=\"my-0 font-weight-normal\">";
            // line 4
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "name", [], "any", false, false, false, 4), "html", null, true);
            echo "</h4>
    </div>
    <div class=\"card-body\">
        <p><small class=\"text-muted\">";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "email", [], "any", false, false, false, 7), "html", null, true);
            echo "</small></p>
        <p>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "task", [], "any", false, false, false, 8), "html", null, true);
            echo "</p>
        ";
            // line 9
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["task"], "status", [], "any", false, false, false, 9), 1))) {
                // line 10
                echo "            <i class=\"fa fa-check color-green\" aria-hidden=\"true\"></i>
        ";
            } else {
                // line 12
                echo "            <i class=\"fa fa-minus-circle\" aria-hidden=\"true\"></i>
        ";
            }
            // line 14
            echo "        ";
            if ((0 === twig_compare(($context["adm"] ?? null), 1))) {
                // line 15
                echo "            <a href=\"/add/edit/?id=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 15), "html", null, true);
                echo "\" class=\"btn btn-lg btn-block btn-outline-primary\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></a>
        ";
            }
            // line 17
            echo "    </div>
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
        return array (  78 => 17,  72 => 15,  69 => 14,  65 => 12,  61 => 10,  59 => 9,  55 => 8,  51 => 7,  45 => 4,  41 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main/card.twig", "C:\\os\\domains\\mvc2\\application\\Views\\main\\card.twig");
    }
}
