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
            echo "
            <div class=\"card text-center\">
                <div class=\"card-header\">
                    <div class=\"row\">
                        <div class=\"col-md-3\">
                            <form>
                                <select class=\"form-control change-type\" data-toggle=\"tooltip\" data-placement=\"top\"
                                        title=\"Select the type of task list\">
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
                        <div class=\"col-md-3\">
                            <form>
                                <select class=\"form-control change-count\" data-toggle=\"tooltip\" data-placement=\"top\"
                                        title=\"How many elements per page\">
                                    <option disabled>Change per page</option>
                                    <option value=\"3\" ";
            // line 26
            if ((0 === twig_compare(($context["perPage"] ?? null), 3))) {
                echo "selected";
            }
            echo ">3</option>
                                    <option value=\"5\" ";
            // line 27
            if ((0 === twig_compare(($context["perPage"] ?? null), 5))) {
                echo "selected";
            }
            echo ">5</option>
                                    ";
            // line 28
            if ((0 === twig_compare(($context["typeList"] ?? null), "list"))) {
                // line 29
                echo "                                    <option value=\"10\" ";
                if ((0 === twig_compare(($context["perPage"] ?? null), 10))) {
                    echo "selected";
                }
                echo ">10</option>
                                    <option value=\"15\" ";
                // line 30
                if ((0 === twig_compare(($context["perPage"] ?? null), 15))) {
                    echo "selected";
                }
                echo ">15</option>
                                    ";
            }
            // line 32
            echo "                                </select>
                            </form>
                        </div>
                        <div class=\"col-md-3\">
                            <div class=\"input-group\">
                                <div class=\"input-group-prepend\">
                                    <div class=\"input-group-text\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i></div>
                                </div>
                                <input type=\"text\" class=\"form-control user-search\" name=\"user\" placeholder=\"Name\">
                            </div>
                        </div>
                        <div class=\"col-md-3\">
                            <button type=\"button\" class=\"btn btn-outline-secondary\" data-toggle=\"tooltip\" data-placement=\"top\"
                                    title=\"Number of all tasks\">
                                <span class=\"badge badge-secondary badge-pill\">";
            // line 46
            echo twig_escape_filter($this->env, ($context["countDataRows"] ?? null), "html", null, true);
            echo "</span>
                            </button>
                            <button type=\"button\" class=\"btn btn-outline-success\" data-toggle=\"tooltip\" data-placement=\"top\"
                                    title=\"Completed tasks\">
                                 <span class=\"badge badge-success badge-pill\">";
            // line 50
            echo twig_escape_filter($this->env, ($context["countStatusComplete"] ?? null), "html", null, true);
            echo "</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class=\"card-body\">
                    ";
            // line 56
            if ((0 === twig_compare(($context["typeList"] ?? null), "card"))) {
                // line 57
                echo "                        <div class=\"card-deck mb-3 text-center\">
                            ";
                // line 58
                $this->loadTemplate("main/card.twig", "main/main.twig", 58)->display($context);
                // line 59
                echo "                        </div>
                    ";
            } else {
                // line 61
                echo "                        <ul class=\"list-group mb-3 listTask\">
                            ";
                // line 62
                $this->loadTemplate("main/head.twig", "main/main.twig", 62)->display($context);
                // line 63
                echo "                            ";
                $this->loadTemplate("main/list.twig", "main/main.twig", 63)->display($context);
                // line 64
                echo "                        </ul>
                    ";
            }
            // line 66
            echo "                </div>
                <div class=\"card-footer text-muted\">
                    ";
            // line 68
            $this->loadTemplate("main/pagination.twig", "main/main.twig", 68)->display($context);
            // line 69
            echo "                </div>
            </div>
        ";
        } else {
            // line 72
            echo "            <div class=\"col-md-12 text-center\"><i class=\"fa fa-key fa-3x\" aria-hidden=\"true\"></i>
                <h3 class=\"h3 mb-3 font-weight-normal\">You need to <a href=\"/admin\" target=\"_blank\">log in</a></h3>
            </div>
        ";
        }
        // line 76
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
        return array (  188 => 76,  182 => 72,  177 => 69,  175 => 68,  171 => 66,  167 => 64,  164 => 63,  162 => 62,  159 => 61,  155 => 59,  153 => 58,  150 => 57,  148 => 56,  139 => 50,  132 => 46,  116 => 32,  109 => 30,  102 => 29,  100 => 28,  94 => 27,  88 => 26,  73 => 16,  66 => 14,  55 => 5,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main/main.twig", "C:\\os\\domains\\mvc2\\application\\Views\\main\\main.twig");
    }
}
