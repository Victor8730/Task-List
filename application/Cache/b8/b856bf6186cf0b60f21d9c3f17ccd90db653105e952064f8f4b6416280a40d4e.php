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

/* add/form.twig */
class __TwigTemplate_db5987d0788c27a9595b876c1ad14ab0a584dd212312a48dd1e871c8c0f7dec7 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'form' => [$this, 'block_form'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $this->displayBlock('form', $context, $blocks);
    }

    public function block_form($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "    <h4 class=\"mb-3\">Adding a task</h4>
    <form class=\"needs-validation form-task\" novalidate method=\"post\" action=\"/add/";
        // line 3
        if ((0 !== twig_compare(($context["id"] ?? null), ""))) {
            echo "put";
        } else {
            echo "post";
        }
        echo "\">
        <div class=\"mb-3\">
            <label for=\"username\">Name <span class=\"text-muted\">*</span></label>
            <div class=\"input-group\">
                <div class=\"input-group-prepend\">
                    <span class=\"input-group-text\"><i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i></span>
                </div>
                <input type=\"text\" class=\"form-control\" id=\"username\" name=\"name\" placeholder=\"What your name?\" required
                       value=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\">
                <div class=\"invalid-feedback\" style=\"width: 100%;\">
                    Your username is required.
                </div>
            </div>
        </div>
        <div class=\"mb-3\">
            <label for=\"email\">Email <span class=\"text-muted\">*</span></label>
            <div class=\"input-group\">
                <div class=\"input-group-prepend\">
                    <span class=\"input-group-text\"><i class=\"fa fa-envelope\" aria-hidden=\"true\"></i></span>
                </div>
                <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"What your email?\" required
                       value=\"";
        // line 24
        echo twig_escape_filter($this->env, ($context["email"] ?? null), "html", null, true);
        echo "\">
                <div class=\"invalid-feedback\">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>
        </div>
        <div class=\"form-group\">
            <label for=\"task\">Your assignment *</label>
            <textarea class=\"form-control\" id=\"task\" name=\"task\" rows=\"3\" placeholder=\"Task text\"
                      required>";
        // line 33
        echo twig_escape_filter($this->env, ($context["task"] ?? null), "html", null, true);
        echo "</textarea>
            <div class=\"invalid-feedback\" style=\"width: 100%;\">
                Your task is required.
            </div>
        </div>
        <div class=\"form-check\">
            <input class=\"form-check-input\" type=\"checkbox\" name=\"status\" id=\"status\"
                    ";
        // line 40
        if ((0 === twig_compare(($context["status"] ?? null), 1))) {
            // line 41
            echo "            checked
                    ";
        }
        // line 42
        echo ">
            <label class=\"form-check-label\" for=\"status\">
                task completed?
            </label>
        </div>
        <hr class=\"mb-4\">
        <input type=\"hidden\" name=\"id-element\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\">
        <div class=\"alert alert-success d-none success-enter\" role=\"alert\"></div>
        <div class=\"alert alert-danger d-none error-enter\" role=\"alert\"></div>
        <button class=\"btn btn-success btn-lg btn-block\" type=\"submit\">
            ";
        // line 52
        if ((0 !== twig_compare(($context["id"] ?? null), ""))) {
            // line 53
            echo "                Edit task
            ";
        } else {
            // line 55
            echo "                Add new task
            ";
        }
        // line 57
        echo "        </button>
    </form>
";
    }

    public function getTemplateName()
    {
        return "add/form.twig";
    }

    public function getDebugInfo()
    {
        return array (  132 => 57,  128 => 55,  124 => 53,  122 => 52,  115 => 48,  107 => 42,  103 => 41,  101 => 40,  91 => 33,  79 => 24,  63 => 11,  48 => 3,  45 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "add/form.twig", "C:\\os\\domains\\mvc2\\application\\Views\\add\\form.twig");
    }
}
