<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* __string_template__bd5b57987803e43fad8bea1a3ba72735077148f2856200a5e084ef352e67ce5e */
class __TwigTemplate_ea02786cde2508e33d7a1458536ac17abce95b4d5ba7179442226f4cd5189b95 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "__string_template__bd5b57987803e43fad8bea1a3ba72735077148f2856200a5e084ef352e67ce5e"));

        // line 1
        echo "<div class=\"row  no-gutters activite-teaser\"> <!-- bloc activite -->
<div class=\"col-sm-12 col-md-4\">
";
        // line 3
        if (($context["field_image_save"] ?? null)) {
            // line 4
            if ((($context["type"] ?? null) == "activite")) {
                // line 5
                echo "<img src=\"https://";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_departement"] ?? null)), "html", null, true);
                echo ".kidiklik.fr/images/activites/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_image_save"] ?? null)), "html", null, true);
                echo "\" />
";
            } elseif ((            // line 6
($context["type"] ?? null) == "Agenda")) {
                // line 7
                echo "<img src=\"https://";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_departement_1"] ?? null)), "html", null, true);
                echo ".kidiklik.fr/images/agendas/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_image_save"] ?? null)), "html", null, true);
                echo "\" />
";
            }
        } else {
            // line 10
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_image"] ?? null)), "html", null, true);
            echo "
";
        }
        // line 12
        if (((($context["type"] ?? null) == "activite") || (($context["type"] ?? null) == "Agenda"))) {
            // line 13
            echo "<div class=\"actions \">
<div class=\"favori\"><a href=\"/flag/flag/bookmark/";
            // line 14
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nid"] ?? null)), "html", null, true);
            echo "?destination&amp;token=zEcKB-noa-tQJz47RQs9aRmWn39g29HWJo09UDVdFcc\" class=\"use-ajax\" rel=\"nofollow\"><i class=\"fa fa-heart-o\"></i>Ajouter</a></div>
<div class=\"reserver\"><a href=\"";
            // line 15
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["view_node"] ?? null)), "html", null, true);
            echo "\">Réserver</a></div>
</div>
";
        }
        // line 18
        echo "</div>

<div class=\"px-3 col-sm-12 col-md-8 content\"><!-- bloc droite-->
<div class=\"row\"> 
<div class=\"col-12 titre\"><h5><a href=\"";
        // line 22
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["view_node"] ?? null)), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null)), "html", null, true);
        echo "</a></h5></div>
</div>
<div class=\"informations\">
";
        // line 25
        if (((($context["type"] ?? null) == "activite") || (($context["type"] ?? null) == "agenda"))) {
            // line 26
            echo "<div class=\"row\"> <!-- bloc information -->
<div class=\"col-6 ville\"><span class=\"fa fa-map-marker\">Ville : </span>";
            // line 27
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_ville_save"] ?? null)), "html", null, true);
            echo "</div>
<div class=\"col-6 a-partir-de\"><span class=\"fa fa-child\">Public : </span>";
            // line 28
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_a_partir_de"] ?? null)), "html", null, true);
            echo "</div>
</div>
";
        }
        // line 31
        echo "<div class=\"row\">
<div class=\"col-6 date\"><span class=\"fa fa-calendar-o\">&nbsp;</span>";
        // line 32
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_date_de_debut"] ?? null)), "html", null, true);
        echo " au ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_date_de_fin"] ?? null)), "html", null, true);
        echo "</div>
";
        // line 33
        if ((($context["field_horaires"] ?? null) && (($context["field_hoaires"] ?? null) != "NULL"))) {
            // line 34
            echo "<div class=\"col-6\"><span class=\"fa fa-clock-o\">&nbsp;<span>";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_horaires"] ?? null)), "html", null, true);
            echo "</div>
";
        }
        // line 36
        echo "</div>
";
        // line 37
        if (($context["field_geolocalisation_proximity_form"] ?? null)) {
            // line 38
            echo "<div class=\"row\">
<div class=\"col-12\">Distance : ";
            // line 39
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_number_format_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_geolocalisation_proximity_form"] ?? null)), 2), "html", null, true);
            echo "km</div>
</div>
";
        }
        // line 42
        echo "</div>
<div class=\"row\">
<div class=\"col-12 resume\">
";
        // line 45
        if ((($context["field_resume"] ?? null) == null)) {
            // line 46
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["body"] ?? null)), "html", null, true);
            echo "
";
        } else {
            // line 48
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_resume"] ?? null)), "html", null, true);
            echo "
";
        }
        // line 50
        echo "</div>
</div>
</div> <!-- fin bloc droite-->
</div>";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "__string_template__bd5b57987803e43fad8bea1a3ba72735077148f2856200a5e084ef352e67ce5e";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 50,  153 => 48,  148 => 46,  146 => 45,  141 => 42,  135 => 39,  132 => 38,  130 => 37,  127 => 36,  121 => 34,  119 => 33,  113 => 32,  110 => 31,  104 => 28,  100 => 27,  97 => 26,  95 => 25,  87 => 22,  81 => 18,  75 => 15,  71 => 14,  68 => 13,  66 => 12,  61 => 10,  52 => 7,  50 => 6,  43 => 5,  41 => 4,  39 => 3,  35 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__bd5b57987803e43fad8bea1a3ba72735077148f2856200a5e084ef352e67ce5e", "");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 3];
        static $filters = ["escape" => 5, "number_format" => 39];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'number_format'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
