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

/* add/add.twig */
class __TwigTemplate_76106f52c360a3f476b79f093db196df1e01706f306a178ecf3442e6ad3e34a1 extends Template
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
        $this->parent = $this->loadTemplate("template.twig", "add/add.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"col-md-12 order-md-2\">

    ";
        // line 6
        if ((0 === twig_compare(($context["adm"] ?? null), 1))) {
            // line 7
            echo "        ";
            $this->loadTemplate("add/form.twig", "add/add.twig", 7)->display($context);
            // line 8
            echo "    ";
        } else {
            // line 9
            echo "        <div class=\"col-md-12 text-center\"><i class=\"fa fa-key fa-3x\" aria-hidden=\"true\"></i>
            <h3 class=\"h3 mb-3 font-weight-normal\">You need to <a href=\"/admin\" target=\"_blank\">log in</a></h3>
        </div>
    ";
        }
        // line 13
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "add/add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 13,  62 => 9,  59 => 8,  56 => 7,  54 => 6,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "add/add.twig", "E:\\Programs\\OpenServer\\domains\\mvc2\\application\\Views\\add\\add.twig");
    }
}
