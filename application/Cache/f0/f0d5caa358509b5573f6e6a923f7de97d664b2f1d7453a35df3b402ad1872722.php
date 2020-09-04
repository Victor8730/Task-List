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
        ";
        // line 3
        echo "    ";
        if ((1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["paginator"] ?? null), "numPages", [], "any", false, false, false, 3), 1))) {
            // line 4
            echo "        <ul class=\"pagination\">
            ";
            // line 5
            if (twig_get_attribute($this->env, $this->source, ($context["paginator"] ?? null), "prevUrl", [], "any", false, false, false, 5)) {
                // line 6
                echo "                <li class=\"page-item\"><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["paginator"] ?? null), "prevUrl", [], "any", false, false, false, 6), "html", null, true);
                echo "\" class=\"page-link\">Previous</a></li>
            ";
            }
            // line 8
            echo "
            ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["paginator"] ?? null), "pages", [], "any", false, false, false, 9));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 10
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, $context["page"], "url", [], "any", false, false, false, 10)) {
                    // line 11
                    echo "                    <li ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page"], "isCurrent", [], "any", false, false, false, 11)) ? ("class=\"page-item active disabled\"") : (""));
                    echo "><a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "url", [], "any", false, false, false, 11), "html", null, true);
                    echo "\" class=\"page-link\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "num", [], "any", false, false, false, 11), "html", null, true);
                    echo "</a></li>
                ";
                } else {
                    // line 13
                    echo "                    <li class=\"page-item disabled\"><span>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "num", [], "any", false, false, false, 13), "html", null, true);
                    echo "</span></li>
                ";
                }
                // line 15
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "
            ";
            // line 17
            if (twig_get_attribute($this->env, $this->source, ($context["paginator"] ?? null), "nextUrl", [], "any", false, false, false, 17)) {
                // line 18
                echo "                <li class=\"page-item\"><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["paginator"] ?? null), "nextUrl", [], "any", false, false, false, 18), "html", null, true);
                echo "\" class=\"page-link\">Next</a></li>
            ";
            }
            // line 20
            echo "        </ul>
    ";
        }
        // line 22
        echo "</nav>";
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
        return array (  101 => 22,  97 => 20,  91 => 18,  89 => 17,  86 => 16,  80 => 15,  74 => 13,  64 => 11,  61 => 10,  57 => 9,  54 => 8,  48 => 6,  46 => 5,  43 => 4,  40 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main/pagination.twig", "C:\\os\\domains\\mvc2\\application\\Views\\main\\pagination.twig");
    }
}
