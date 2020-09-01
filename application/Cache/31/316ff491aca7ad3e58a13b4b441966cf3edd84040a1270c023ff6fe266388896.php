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

/* admin/admin.twig */
class __TwigTemplate_3a6b653330252ee04e152ff0a53446345a79fa7b523cec27fed8faeac75d60b5 extends Template
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
        $this->parent = $this->loadTemplate("template.twig", "admin/admin.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"col-md-12 text-center\">
    <form class=\"form-signin needs-validation\" novalidate method=\"post\" action=\"/admin/auth\">
        <i class=\"fa fa-shield fa-3x\" aria-hidden=\"true\"></i>
        <h1 class=\"h3 mb-3 font-weight-normal\">Please sign in</h1>
        <label for=\"inputName\" class=\"sr-only\">Name</label>
        <div class=\"form-group\">
            <input type=\"text\" id=\"inputName\" class=\"form-control\" name=\"name\" placeholder=\"Name\" required autofocus>
            <div class=\"invalid-feedback\" style=\"width: 100%;\">
                Name is required.
            </div>
        </div>
        <div class=\"form-group\">
            <label for=\"inputPassword\" class=\"sr-only\">Password</label>
            <input type=\"password\" id=\"inputPassword\" class=\"form-control\" name=\"pass\" placeholder=\"Password\" required>
            <div class=\"invalid-feedback\" style=\"width: 100%;\">
                Password is required.
            </div>
        </div>
        <div class=\"alert alert-success d-none success-enter\" role=\"alert\"></div>
        <div class=\"alert alert-danger d-none error-enter\" role=\"alert\"></div>
        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Sign in</button>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin/admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/admin.twig", "E:\\Programs\\OpenServer\\domains\\mvc2\\application\\Views\\admin\\admin.twig");
    }
}
