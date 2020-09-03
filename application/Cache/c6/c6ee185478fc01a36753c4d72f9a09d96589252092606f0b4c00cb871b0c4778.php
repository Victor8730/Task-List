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
            // line 9
            echo twig_escape_filter($this->env, ($context["countDataRows"] ?? null), "html", null, true);
            echo "</span></div>
                <div class=\"col-md-4\">
                    <form>
                        <select class=\"form-control change-type\">
                            <option disabled>Change style list</option>
                            <option value=\"list\" ";
            // line 14
            if ((0 === twig_compare(($context["typeList"] ?? null), "list"))) {
                echo "selected";
            }
            echo ">List
                            </option>
                            <option value=\"card\" ";
            // line 16
            if ((0 === twig_compare(($context["typeList"] ?? null), "card"))) {
                echo "selected";
            }
            echo ">Card
                            </option>
                        </select>
                    </form>
                </div>
                <div class=\"col-md-4\"></div>
            </div>
            ";
            // line 23
            if ((0 === twig_compare(($context["typeList"] ?? null), "card"))) {
                // line 24
                echo "                <div class=\"card-deck mb-3 text-center\">
                    ";
                // line 25
                $this->loadTemplate("main/card.twig", "main/main.twig", 25)->display($context);
                // line 26
                echo "                </div>
            ";
            } else {
                // line 28
                echo "                <ul class=\"list-group mb-3 listTask\">
                    ";
                // line 29
                $this->loadTemplate("main/head.twig", "main/main.twig", 29)->display($context);
                // line 30
                echo "                    ";
                $this->loadTemplate("main/list.twig", "main/main.twig", 30)->display($context);
                // line 31
                echo "                </ul>
            ";
            }
            // line 33
            echo "            ";
            $this->loadTemplate("main/pagination.twig", "main/main.twig", 33)->display($context);
            // line 34
            echo "        ";
        } else {
            // line 35
            echo "            <div class=\"col-md-12 text-center\"><i class=\"fa fa-key fa-3x\" aria-hidden=\"true\"></i>
                <h3 class=\"h3 mb-3 font-weight-normal\">You need to <a href=\"/admin\" target=\"_blank\">log in</a></h3>
            </div>
        ";
        }
        // line 39
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
        return array (  123 => 39,  117 => 35,  114 => 34,  111 => 33,  107 => 31,  104 => 30,  102 => 29,  99 => 28,  95 => 26,  93 => 25,  90 => 24,  88 => 23,  76 => 16,  69 => 14,  61 => 9,  55 => 5,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main/main.twig", "C:\\os\\domains\\mvc2\\application\\Views\\main\\main.twig");
    }
}
