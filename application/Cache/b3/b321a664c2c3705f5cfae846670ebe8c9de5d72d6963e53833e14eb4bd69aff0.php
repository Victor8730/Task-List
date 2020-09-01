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

/* form.twig */
class __TwigTemplate_9884f86f3ee6668258b971eaad39a465e25ab76bc92b78beeb91c406efe41483 extends Template
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
        echo "<h4 class=\"mb-3\">Adding a task</h4>
<form class=\"needs-validation form-task\" novalidate method=\"post\" action=\"#ROOT#/add/#action#\">
    <div class=\"mb-3\">
        <label for=\"username\">Name <span class=\"text-muted\">*</span></label>
        <div class=\"input-group\">
            <div class=\"input-group-prepend\">
                <span class=\"input-group-text\"><i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i></span>
            </div>
            <input type=\"text\" class=\"form-control\" id=\"username\" name=\"name\" placeholder=\"What your name?\" required value=\"#valuename#\">
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
            <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"What your email?\" required value=\"#valuemail#\">
            <div class=\"invalid-feedback\">
                Please enter a valid email address for shipping updates.
            </div>
        </div>
    </div>
    <div class=\"form-group\">
        <label for=\"task\">Your assignment *</label>
        <textarea class=\"form-control\" id=\"task\" name=\"task\" rows=\"3\" placeholder=\"Task text\" required>#valuetask#</textarea>
        <div class=\"invalid-feedback\" style=\"width: 100%;\">
            Your task is required.
        </div>
    </div>
    <div class=\"form-check\">
        <input class=\"form-check-input\" type=\"checkbox\" name=\"status\" id=\"status\" #valuestatuschecked#>
        <label class=\"form-check-label\" for=\"status\">
            task completed?
        </label>
    </div>
    <hr class=\"mb-4\">
    <input type=\"hidden\" name=\"id-element\" value=\"#valueid#\">
    <div class=\"alert alert-success d-none success-enter\" role=\"alert\"></div>
    <div class=\"alert alert-danger d-none error-enter\" role=\"alert\"></div>
    <button class=\"btn btn-success btn-lg btn-block\" type=\"submit\">#button#</button>
</form>
";
    }

    public function getTemplateName()
    {
        return "form.twig";
    }

    public function getDebugInfo()
    {
        return array (  45 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "form.twig", "E:\\Programs\\OpenServer\\domains\\mvc2\\application\\Views\\form.twig");
    }
}
