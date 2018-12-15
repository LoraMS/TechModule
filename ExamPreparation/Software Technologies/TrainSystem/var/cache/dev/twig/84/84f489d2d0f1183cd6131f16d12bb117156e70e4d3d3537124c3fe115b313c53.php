<?php

/* trip/edit.html.twig */
class __TwigTemplate_b9ba3bb53114aa6316308cac092d5f1038b8094d14e7f08726a45fc7305d209d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "trip/edit.html.twig", 1);
        $this->blocks = array(
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "trip/edit.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "trip/edit.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 4
        echo "<div class=\"wrapper\">
    <form class=\"trip-create\" method=\"post\">
        <div class=\"create-header\">
            Edit Trip
        </div>
        <div class=\"create-origin\">
            <div class=\"create-origin-label\">Origin</div>
            <input class=\"create-origin-content\" name=\"trip[origin]\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trip"]) || array_key_exists("trip", $context) ? $context["trip"] : (function () { throw new Twig_Error_Runtime('Variable "trip" does not exist.', 11, $this->source); })()), "origin", array()), "html", null, true);
        echo "\" />
        </div>
        <div class=\"create-destination\">
            <div class=\"create-destination-label\">Destination</div>
            <input class=\"create-destination-content\" name=\"trip[destination]\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trip"]) || array_key_exists("trip", $context) ? $context["trip"] : (function () { throw new Twig_Error_Runtime('Variable "trip" does not exist.', 15, $this->source); })()), "destination", array()), "html", null, true);
        echo "\" />
        </div>
        <div class=\"create-business\">
            <div class=\"create-business-label\">Business Class Price</div>
            <input type=\"number\" min=\"0\" class=\"create-business-content\" name=\"trip[business]\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trip"]) || array_key_exists("trip", $context) ? $context["trip"] : (function () { throw new Twig_Error_Runtime('Variable "trip" does not exist.', 19, $this->source); })()), "business", array()), "html", null, true);
        echo "\" />
        </div>
        <div class=\"create-economy\">
            <div class=\"create-economy-label\">Economy Class Price</div>
            <input type=\"number\" min=\"0\" class=\"create-economy-content\" name=\"trip[economy]\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trip"]) || array_key_exists("trip", $context) ? $context["trip"] : (function () { throw new Twig_Error_Runtime('Variable "trip" does not exist.', 23, $this->source); })()), "economy", array()), "html", null, true);
        echo "\" />
        </div>
        <div class=\"create-button-holder\">
            <button type=\"submit\" class=\"submit-button\">Edit Trip</button>
            <a type=\"button\" href=\"/\" class=\"back-button\">Back</a>
        </div>

        ";
        // line 30
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 30, $this->source); })()), "_token", array()), 'row');
        echo "
    </form>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "trip/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 30,  83 => 23,  76 => 19,  69 => 15,  62 => 11,  53 => 4,  44 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.html.twig\" %}

{% block main %}
<div class=\"wrapper\">
    <form class=\"trip-create\" method=\"post\">
        <div class=\"create-header\">
            Edit Trip
        </div>
        <div class=\"create-origin\">
            <div class=\"create-origin-label\">Origin</div>
            <input class=\"create-origin-content\" name=\"trip[origin]\" value=\"{{ trip.origin }}\" />
        </div>
        <div class=\"create-destination\">
            <div class=\"create-destination-label\">Destination</div>
            <input class=\"create-destination-content\" name=\"trip[destination]\" value=\"{{ trip.destination }}\" />
        </div>
        <div class=\"create-business\">
            <div class=\"create-business-label\">Business Class Price</div>
            <input type=\"number\" min=\"0\" class=\"create-business-content\" name=\"trip[business]\" value=\"{{ trip.business }}\" />
        </div>
        <div class=\"create-economy\">
            <div class=\"create-economy-label\">Economy Class Price</div>
            <input type=\"number\" min=\"0\" class=\"create-economy-content\" name=\"trip[economy]\" value=\"{{ trip.economy }}\" />
        </div>
        <div class=\"create-button-holder\">
            <button type=\"submit\" class=\"submit-button\">Edit Trip</button>
            <a type=\"button\" href=\"/\" class=\"back-button\">Back</a>
        </div>

        {{ form_row(form._token) }}
    </form>
</div>
{% endblock %}

", "trip/edit.html.twig", "C:\\xampp\\htdocs\\TechModule\\ExamPreparation\\SoftwareTechnologies\\TrainSystem\\app\\Resources\\views\\trip\\edit.html.twig");
    }
}
