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

/* template.twig */
class __TwigTemplate_b07905da32e982309f7880a5ccb9c6301d6e2faf317e4f020ebddbbf8355a4e8 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"ru\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"description\" content=\"Task List\">
    <meta name=\"author\" content=\"Victor Galiuzov\">
    <link rel=\"icon\" href=\"/img/favicon.ico\">
    <title>example Task Manager</title>
    <link href=\"/css/bootstrap.css\" rel=\"stylesheet\">
    <link href=\"/css/form-validation.css\" rel=\"stylesheet\">
    <link href=\"/css/font-awesome.css\" rel=\"stylesheet\">
    <link href=\"/css/style.css\" rel=\"stylesheet\">
</head>
<body class=\"bg-light\">
<header>
    <div class=\"bg-dark collapse\" id=\"navbarHeader\" style=\"\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-12 py-4\">
                    <h4 class=\"text-white\">About task list</h4>
                    <p class=\"text-muted\">Created to add new tasks. New tasks can be added by only admin. Only the admin
                        can
                        edit.</p>
                </div>
            </div>
        </div>
    </div>
    <div class=\"navbar navbar-dark bg-dark box-shadow\">
        <div class=\"container d-flex justify-content-between\">
            <a href=\"/\" class=\"navbar-toggler\" title=\"Show all task\">
                <i class=\"fa fa-list fa-2x\" aria-hidden=\"true\"></i>
            </a>
            <a href=\"/admin\" class=\"navbar-toggler\" title=\"Administrator\">
                <i class=\"fa fa-unlock-alt fa-2x\" aria-hidden=\"true\"></i>
            </a>
            <a href=\"/add\" class=\"navbar-toggler\" title=\"Add new task\">
                <i class=\"fa fa-plus-circle fa-2x\" aria-hidden=\"true\"></i>
            </a>
            <button class=\"navbar-toggler\" type=\"button\" title=\"Show info\" data-toggle=\"collapse\"
                    data-target=\"#navbarHeader\" aria-controls=\"navbarHeader\" aria-expanded=\"true\"
                    aria-label=\"Toggle navigation\">
                <i class=\"fa fa-info-circle fa-2x mr-4\" aria-hidden=\"true\"></i>
            </button>
            ";
        // line 45
        if ((0 === twig_compare(($context["adm"] ?? null), 1))) {
            // line 46
            echo "                ";
            $this->loadTemplate("admin/logout.twig", "template.twig", 46)->display($context);
            // line 47
            echo "            ";
        }
        // line 48
        echo "        </div>
    </div>
</header>
<div class=\"container\">
    <div class=\"col-md-12\">
        <div class=\"info-block\">

        </div>
    </div>
    <div class=\"py-3 text-center\">
        <img class=\"d-block mx-auto mb-2\" src=\"/img/task.png\" alt=\"Task Manager\" width=\"150\" height=\"150\">
        <h2>Task list</h2>
    </div>

    <div class=\"row content\">
        ";
        // line 63
        $this->displayBlock('content', $context, $blocks);
        // line 65
        echo "    </div>

    <footer class=\"my-5 pt-5 text-muted text-center text-small\">
        <p class=\"mb-1\">&copy; 2020 Webpagestudio</p>
        <ul class=\"list-group list-group-horizontal d-inline-flex\">
            <li class=\"list-group-item\"><a href=\"/\">Home</a></li>
            <li class=\"list-group-item\"><a href=\"/admin\">Admin</a></li>
            <li class=\"list-group-item\"><a href=\"/add\">Add task</a></li>
        </ul>
        <p>";
        // line 74
        echo twig_escape_filter($this->env, ($context["timeGeneration"] ?? null), "html", null, true);
        echo "</p>
    </footer>
</div>

<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\" crossorigin=\"anonymous\"></script>
<script src=\"/js/bootstrap.js\"></script>
<script src=\"/js/bootstrap.bundle.js\"></script>
<script>
    \$(function () {
        \$('[data-toggle=\"tooltip\"]').tooltip();
    });

    (function () {
        'use strict';
        window.addEventListener('load', function () {
            let forms = document.getElementsByClassName('needs-validation');
            let validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    function showAlert(message, type) {
        \$('.info-block').append('<div class=\"alert alert-' + type + '\" role=\"alert\">' + message + '</div>').hide().fadeIn(1000).fadeOut(3000);
        setTimeout(function () {
            \$(\".alert\").alert('close');
        }, 3000);
    }

    \$(\".form-signin, .form-task\").submit(function () {
        event.preventDefault();
        let data = \$(this).serialize();
        let action = \$(this).attr('action');
        \$.ajax({
            type: \"POST\",
            url: action,
            data: data,
            dataType: 'json',
            success: function (answer) {
                if (answer['success'] === true) {
                    showAlert(answer['message'], 'success');
                    setTimeout(function () {
                        document.location.href = ''
                    }, 3000);
                } else {
                    showAlert(answer['message'], 'danger');
                }
            }
        });
    });
    \$(\".logout-button\").on('click', function () {
        event.preventDefault();
        let action = \$(this).attr('url');
        \$.ajax({
            type: \"POST\",
            url: action,
            dataType: 'json',
            success: function (answer) {
                if (answer['success'] === true) {
                    \$('.success-enter').removeClass('d-none').text(answer['message']).show(2000).hide(5000);
                    setTimeout(function () {
                        document.location.href = ''
                    }, 2500);
                }
            }
        });
    });
    \$(\".change-type\").on('change', function () {
        let list = \$(this).val();
        \$.ajax({
            type: 'POST',
            url: 'main/changelist',
            data: {list: list},
            dataType: 'json',
            success: function (answer) {
                if (answer['success'] === true) {
                    showAlert(answer['message'], 'info');
                    setTimeout(function () {
                        document.location.href = ''
                    }, 2500);
                }
            }
        });
    });

    \$(\".change-count\").on('change', function () {
        let limit = \$(this).val();
        \$.ajax({
            type: 'POST',
            url: 'main/changeperpage',
            data: {limit: limit},
            dataType: 'json',
            success: function (answer) {
                if (answer['success'] === true) {
                    showAlert(answer['message'], 'info');
                    setTimeout(function () {
                        document.location.href = ''
                    }, 2500);
                }
            }
        });
    });
</script>
</body>
</html>";
    }

    // line 63
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 64
        echo "        ";
    }

    public function getTemplateName()
    {
        return "template.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 64,  237 => 63,  122 => 74,  111 => 65,  109 => 63,  92 => 48,  89 => 47,  86 => 46,  84 => 45,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "template.twig", "E:\\Programs\\OpenServer\\domains\\mvc2\\application\\Views\\template.twig");
    }
}
