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

/* themes/druadmin_lte_theme/templates/navigation/menu.html.twig */
class __TwigTemplate_207461ac22df2a524764d19d572ff8ea8a2770a8b9e47c6949e2579ab6671fa9 extends \Twig\Template
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "themes/druadmin_lte_theme/templates/navigation/menu.html.twig"));

        // line 16
        $context["menus"] = $this;
        // line 17
        echo "
";
        // line 22
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($context["menus"]->getmenu_links(($context["items"] ?? null), ($context["attributes"] ?? null), 0));
        echo "

";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 24
    public function getmenu_links($__items__ = null, $__attributes__ = null, $__menu_level__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "items" => $__items__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
            $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "menu_links"));

            // line 25
            echo "  ";
            $context["menus"] = $this;
            // line 26
            echo "  
  ";
            // line 27
            if (($context["items"] ?? null)) {
                // line 28
                echo "    ";
                if ((($context["menu_level"] ?? null) != 0)) {
                    // line 29
                    echo "      <ul class=\"treeview-menu\">
    ";
                }
                // line 31
                echo "      ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 32
                    echo "      ";
                    if ($this->getAttribute($context["item"], "below", [])) {
                        // line 33
                        echo "        <li class=\"treeview ";
                        if ((($context["menu_level"] ?? null) == 0)) {
                            echo "prem";
                        }
                        echo " ";
                        if (($this->getAttribute($context["item"], "active", []) == 1)) {
                            echo "active";
                        }
                        echo "\">
      ";
                    } else {
                        // line 35
                        echo "        <li>
      ";
                    }
                    // line 37
                    echo "          <a href=\"";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "url", [])), "html", null, true);
                    if ($this->getAttribute($context["item"], "parent", [])) {
                        echo "?parent=";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "parent", [])), "html", null, true);
                    }
                    echo "\">
            <i class=\"fa ";
                    // line 38
                    if ($this->getAttribute($context["item"], "icon", [])) {
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "icon", [])), "html", null, true);
                    } else {
                        echo "fa-circle-o";
                    }
                    echo "\"></i>
            <span>";
                    // line 39
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, strip_tags($this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", []))), "html", null, true);
                    echo "</span>
            ";
                    // line 40
                    if ($this->getAttribute($context["item"], "below", [])) {
                        // line 41
                        echo "              <i class=\"fa fa-angle-left pull-right\"></i>
            ";
                    }
                    // line 43
                    echo "          </a>
          ";
                    // line 44
                    if ($this->getAttribute($context["item"], "below", [])) {
                        // line 45
                        echo "            ";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($context["menus"]->getmenu_links($this->getAttribute($context["item"], "below", []), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)));
                        echo "
          ";
                    }
                    // line 47
                    echo "        </li>
      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 49
                echo "    ";
                if ((($context["menu_level"] ?? null) != 0)) {
                    // line 50
                    echo "      </ul>
    ";
                }
                // line 52
                echo "  ";
            }
            
            $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "themes/druadmin_lte_theme/templates/navigation/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 52,  154 => 50,  151 => 49,  144 => 47,  138 => 45,  136 => 44,  133 => 43,  129 => 41,  127 => 40,  123 => 39,  115 => 38,  106 => 37,  102 => 35,  90 => 33,  87 => 32,  82 => 31,  78 => 29,  75 => 28,  73 => 27,  70 => 26,  67 => 25,  50 => 24,  40 => 22,  37 => 17,  35 => 16,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/druadmin_lte_theme/templates/navigation/menu.html.twig", "/var/www/html/web/themes/druadmin_lte_theme/templates/navigation/menu.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["import" => 16, "macro" => 24, "if" => 27, "for" => 31];
        static $filters = ["escape" => 37, "striptags" => 39];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['import', 'macro', 'if', 'for'],
                ['escape', 'striptags'],
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
