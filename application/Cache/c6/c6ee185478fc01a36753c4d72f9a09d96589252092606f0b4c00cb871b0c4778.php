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

/* main/main.twig */
class __TwigTemplate_072919fa5d8c672658f8f010fb26aca46ba0383b43d07be427fc5bf7010f9b50 extends Template
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
        $this->parent = $this->loadTemplate("template.twig", "main/main.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <div class=\"col-md-12 order-md-1 mb-4\">
        <div class=\"row mb-2 py-3\">
            <div class=\"col-md-1\"><span class=\"badge badge-info badge-pill\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tooltip on top\">";
        // line 5
        echo twig_escape_filter($this->env, ($context["countDataRows"] ?? null), "html", null, true);
        echo "</span></div>
            <div class=\"col-md-4\">
                <select class=\"form-control\">
                    <option value=\"list\">List</option>
                    <option value=\"card\">Card</option>
                </select>
            </div>

        </div>

";
        // line 19
        echo "        <div class=\"card-deck mb-3 text-center\">
            ";
        // line 20
        $this->loadTemplate("main/card.twig", "main/main.twig", 20)->display($context);
        // line 21
        echo "        </div>
        ";
        // line 22
        $this->loadTemplate("main/pagination.twig", "main/main.twig", 22)->display($context);
        // line 23
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "main/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 23,  75 => 22,  72 => 21,  70 => 20,  67 => 19,  54 => 5,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main/main.twig", "E:\\Programs\\OpenServer\\domains\\mvc2\\application\\Views\\main\\main.twig");
    }
}
