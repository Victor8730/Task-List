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
        echo "    <div class=\"col-md-12 order-md-2\">
        ";
        // line 4
        if ((0 === twig_compare(($context["adm"] ?? null), 1))) {
            // line 5
            echo "            <div class=\"row mb-2 py-3\">
                <div class=\"col-md-1\"><span class=\"badge badge-info badge-pill\" data-toggle=\"tooltip\"
                                            data-placement=\"top\"
                                            title=\"Tooltip on top\">";
            // line 8
            echo twig_escape_filter($this->env, ($context["countDataRows"] ?? null), "html", null, true);
            echo "</span></div>
                <div class=\"col-md-4\">
                    <form>
                        <select class=\"form-control change-type\">
                            <option value=\"/main/index/?list=list\" ";
            // line 12
            if ((0 === twig_compare(($context["typeList"] ?? null), "list"))) {
                echo "selected";
            }
            echo ">List</option>
                            <option value=\"/main/index/?list=card\" ";
            // line 13
            if ((0 === twig_compare(($context["typeList"] ?? null), "card"))) {
                echo "selected";
            }
            echo ">Card</option>
                        </select>
                    </form>
                </div>

            </div>
            ";
            // line 19
            if ((0 === twig_compare(($context["typeList"] ?? null), "card"))) {
                // line 20
                echo "                <div class=\"card-deck mb-3 text-center\">
                    ";
                // line 21
                $this->loadTemplate("main/card.twig", "main/main.twig", 21)->display($context);
                // line 22
                echo "                </div>
            ";
            } else {
                // line 24
                echo "                <ul class=\"list-group mb-3 listTask\">
                    ";
                // line 25
                $this->loadTemplate("main/head.twig", "main/main.twig", 25)->display($context);
                // line 26
                echo "                    ";
                $this->loadTemplate("main/list.twig", "main/main.twig", 26)->display($context);
                // line 27
                echo "                </ul>
            ";
            }
            // line 29
            echo "            ";
            $this->loadTemplate("main/pagination.twig", "main/main.twig", 29)->display($context);
            // line 30
            echo "        ";
        } else {
            // line 31
            echo "            <div class=\"col-md-12 text-center\"><i class=\"fa fa-key fa-3x\" aria-hidden=\"true\"></i>
                <h3 class=\"h3 mb-3 font-weight-normal\">You need to <a href=\"/admin\" target=\"_blank\">log in</a></h3>
            </div>
        ";
        }
        // line 35
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
        return array (  119 => 35,  113 => 31,  110 => 30,  107 => 29,  103 => 27,  100 => 26,  98 => 25,  95 => 24,  91 => 22,  89 => 21,  86 => 20,  84 => 19,  73 => 13,  67 => 12,  60 => 8,  55 => 5,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main/main.twig", "E:\\Programs\\OpenServer\\domains\\mvc2\\application\\Views\\main\\main.twig");
    }
}
