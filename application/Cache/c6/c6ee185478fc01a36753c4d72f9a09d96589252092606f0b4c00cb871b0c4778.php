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
            echo "            <div class=\"card text-center\">
                <div class=\"card-header\">
                    <div class=\"row\">
                        <div class=\"col-md-3\">
                            <form>
                                <select class=\"form-control change-type tooltip-show\"
                                        title=\"Select the type of task list\">
                                    <option disabled>Change style list</option>
                                    <option value=\"list\" ";
            // line 13
            if ((0 === twig_compare(($context["typeList"] ?? null), "list"))) {
                echo "selected";
            }
            echo ">List
                                    </option>
                                    <option value=\"card\" ";
            // line 15
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
                                <select class=\"form-control change-count tooltip-show\"
                                        title=\"How many elements per page\">
                                    <option disabled>Change per page</option>
                                    <option value=\"3\" ";
            // line 25
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "limit", [], "any", false, false, false, 25), 3))) {
                echo "selected";
            }
            echo ">3</option>
                                    ";
            // line 26
            if ((0 === twig_compare(($context["typeList"] ?? null), "list"))) {
                // line 27
                echo "                                        <option value=\"5\" ";
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "limit", [], "any", false, false, false, 27), 5))) {
                    echo "selected";
                }
                echo ">5</option>
                                        <option value=\"10\" ";
                // line 28
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "limit", [], "any", false, false, false, 28), 10))) {
                    echo "selected";
                }
                echo ">10</option>
                                        <option value=\"15\" ";
                // line 29
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "limit", [], "any", false, false, false, 29), 15))) {
                    echo "selected";
                }
                echo ">15</option>
                                    ";
            }
            // line 31
            echo "                                </select>
                            </form>
                        </div>
                        <div class=\"col-md-4\">
                            <form method=\"post\">
                                <div class=\"input-group\">
                                    <div class=\"input-group-prepend\">
                                        <div class=\"input-group-text\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i>
                                        </div>
                                    </div>
                                    <input type=\"text\" class=\"form-control user-search\" name=\"name\" placeholder=\"Name\"
                                           value=\"";
            // line 42
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\">
                                    ";
            // line 43
            if ((0 !== twig_compare(($context["name"] ?? null), ""))) {
                // line 44
                echo "                                        <a href=\"/\" type=\"submit\" class=\"btn btn-secondary tooltip-show\"
                                           title=\"Close Filter\"><i class=\"fa fa-times-circle\"
                                                                   aria-hidden=\"true\"></i></a>
                                    ";
            }
            // line 48
            echo "                                    <button type=\"submit\" class=\"btn btn-secondary tooltip-show\" title=\"Filter apply\">
                                        Search
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class=\"col-md-2\">
                            <button type=\"button\" class=\"btn btn-outline-secondary\" data-toggle=\"tooltip\"
                                    title=\"Number of all tasks\">
                                <span class=\"badge badge-secondary badge-pill\">";
            // line 57
            echo twig_escape_filter($this->env, ($context["countDataRows"] ?? null), "html", null, true);
            echo "</span>
                            </button>
                            <button type=\"button\" class=\"btn btn-outline-success\" data-toggle=\"tooltip\"
                                    title=\"Completed tasks\">
                                <span class=\"badge badge-success badge-pill\">";
            // line 61
            echo twig_escape_filter($this->env, ($context["countStatusComplete"] ?? null), "html", null, true);
            echo "</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class=\"card-body\">
                    ";
            // line 67
            if ((0 === twig_compare(($context["typeList"] ?? null), "card"))) {
                // line 68
                echo "                        <div class=\"card-deck mb-3 text-center\">
                            ";
                // line 69
                $this->loadTemplate("main/card.twig", "main/main.twig", 69)->display($context);
                // line 70
                echo "                        </div>
                    ";
            } else {
                // line 72
                echo "                        <ul class=\"list-group mb-3 listTask\">
                            ";
                // line 73
                $this->loadTemplate("main/head.twig", "main/main.twig", 73)->display($context);
                // line 74
                echo "                            ";
                $this->loadTemplate("main/list.twig", "main/main.twig", 74)->display($context);
                // line 75
                echo "                        </ul>
                    ";
            }
            // line 77
            echo "                </div>
                <div class=\"card-footer text-muted\">
                    ";
            // line 79
            $this->loadTemplate("main/pagination.twig", "main/main.twig", 79)->display($context);
            // line 80
            echo "                </div>
            </div>
        ";
        } else {
            // line 83
            echo "            <div class=\"col-md-12 text-center\"><i class=\"fa fa-key fa-3x\" aria-hidden=\"true\"></i>
                <h3 class=\"h3 mb-3 font-weight-normal\">You need to <a href=\"/admin\" target=\"_blank\">log in</a></h3>
            </div>
        ";
        }
        // line 87
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
        return array (  207 => 87,  201 => 83,  196 => 80,  194 => 79,  190 => 77,  186 => 75,  183 => 74,  181 => 73,  178 => 72,  174 => 70,  172 => 69,  169 => 68,  167 => 67,  158 => 61,  151 => 57,  140 => 48,  134 => 44,  132 => 43,  128 => 42,  115 => 31,  108 => 29,  102 => 28,  95 => 27,  93 => 26,  87 => 25,  72 => 15,  65 => 13,  55 => 5,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main/main.twig", "E:\\Programs\\OpenServer\\domains\\mvc2\\application\\Views\\main\\main.twig");
    }
}
