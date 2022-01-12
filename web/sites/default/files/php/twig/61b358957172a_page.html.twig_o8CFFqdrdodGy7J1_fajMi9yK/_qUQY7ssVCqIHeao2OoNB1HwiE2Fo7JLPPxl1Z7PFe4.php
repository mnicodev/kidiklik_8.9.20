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

/* themes/contrib/kidiklik/templates/system/page.html.twig */
class __TwigTemplate_d592e6a35cbbe7ff33d5fc00e3d7e3b0febd11b3e8e74f9e4c9379204d066841 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'navbar' => [$this, 'block_navbar'],
            'main' => [$this, 'block_main'],
            'header' => [$this, 'block_header'],
            'sidebar_first' => [$this, 'block_sidebar_first'],
            'highlighted' => [$this, 'block_highlighted'],
            'help' => [$this, 'block_help'],
            'content' => [$this, 'block_content'],
            'sidebar_second' => [$this, 'block_sidebar_second'],
            'footer' => [$this, 'block_footer'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "themes/contrib/kidiklik/templates/system/page.html.twig"));

        // line 54
        $context["container"] = (($this->getAttribute($this->getAttribute(($context["theme"] ?? null), "settings", []), "fluid_container", [])) ? ("container-fluid") : ("container"));
        // line 56
        if (($this->getAttribute(($context["page"] ?? null), "navigation", []) || $this->getAttribute(($context["page"] ?? null), "navigation_collapsible", []))) {
            // line 57
            echo "  ";
            $this->displayBlock('navbar', $context, $blocks);
        }
        // line 94
        echo "
";
        // line 96
        $this->displayBlock('main', $context, $blocks);
        // line 320
        echo "
";
        // line 321
        if ($this->getAttribute(($context["page"] ?? null), "zone_rubriques_activites", [])) {
            // line 322
            echo "<section id=\"rubriques_activites\" class=\"\">
\t";
            // line 323
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "zone_rubriques_activites", [])), "html", null, true);
            echo "
</section>
";
        }
        // line 326
        echo "
";
        // line 327
        if ($this->getAttribute(($context["page"] ?? null), "footer", [])) {
            // line 328
            echo "  ";
            $this->displayBlock('footer', $context, $blocks);
        }
        // line 358
        echo "<div class=\"shadow\"></div>
<div class=\"icon-menu-open\"></div>
";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 57
    public function block_navbar($context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "navbar"));

        // line 58
        echo "    ";
        // line 59
        $context["navbar_classes"] = [0 => "navbar", 1 => (($this->getAttribute($this->getAttribute(        // line 61
($context["theme"] ?? null), "settings", []), "navbar_inverse", [])) ? ("navbar-inverse") : ("navbar-default")), 2 => (($this->getAttribute($this->getAttribute(        // line 62
($context["theme"] ?? null), "settings", []), "navbar_position", [])) ? (("navbar-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["theme"] ?? null), "settings", []), "navbar_position", []))))) : (($context["container"] ?? null)))];
        // line 65
        echo "    <header";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["navbar_attributes"] ?? null), "addClass", [0 => ($context["navbar_classes"] ?? null)], "method")), "html", null, true);
        echo " id=\"navbar\" role=\"banner\">
      ";
        // line 66
        if ( !$this->getAttribute(($context["navbar_attributes"] ?? null), "hasClass", [0 => ($context["container"] ?? null)], "method")) {
            // line 67
            echo "        <div class=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null)), "html", null, true);
            echo "\">
      ";
        }
        // line 69
        echo "      <div class=\"navbar-header\">
        
        ";
        // line 72
        echo "        ";
        if ($this->getAttribute(($context["page"] ?? null), "navigation_collapsible", [])) {
            // line 73
            echo "          <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\">
            <span class=\"sr-only\">";
            // line 74
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Toggle navigation"));
            echo "</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
        ";
        }
        // line 80
        echo "      </div>

      ";
        // line 83
        echo "      ";
        if ($this->getAttribute(($context["page"] ?? null), "navigation_collapsible", [])) {
            // line 84
            echo "        <div id=\"navbar-collapse\" class=\"navbar-collapse collapse\">
          ";
            // line 85
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "navigation_collapsible", [])), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 88
        echo "      ";
        if ( !$this->getAttribute(($context["navbar_attributes"] ?? null), "hasClass", [0 => ($context["container"] ?? null)], "method")) {
            // line 89
            echo "        </div>
      ";
        }
        // line 91
        echo "    </header>
  ";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 96
    public function block_main($context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "main"));

        // line 97
        echo " <div class=\" \" id=\"entete\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-lg-9 col-12\">
\t\t\t\t<div class=\"row\">
\t\t\t\t  ";
        // line 103
        echo "\t\t\t\t  ";
        if ($this->getAttribute(($context["page"] ?? null), "header", [])) {
            // line 104
            echo "\t\t\t\t\t";
            $this->displayBlock('header', $context, $blocks);
            // line 109
            echo "\t\t\t\t  ";
        }
        // line 110
        echo "

\t\t\t\t  ";
        // line 112
        if ((($context["dep"] ?? null) != "0")) {
            // line 113
            echo "\t\t\t\t\t<div class=\"col-sm-2 col-lg-2 col-2 accueil_dep\" role=\"heading\">
\t\t\t\t\t\t<a href=\"/\"><img src=\"/assets/img/pictos/";
            // line 114
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["dep"] ?? null)), "html", null, true);
            echo ".png\" />
\t\t\t\t\t\t<span>Accueil</span></a>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-sm-8 col-lg-10 col-8 logo-dep\">
\t\t\t\t\t\t";
            // line 119
            echo "\t\t\t\t\t\t<img alt=\"Piaf\" class=\"d-lg-inline d-none\" data-entity-type=\"file\" data-entity-uuid=\"deec89ec-64b9-4986-844f-12c402cddab9\" src=\"/assets/img/image_header.jpg\" />
\t\t\t\t\t\t<img alt=\"kidiklik\" class=\"d-lg-none d-inline\" data-entity-type=\"file\" data-entity-uuid=\"c71dcf87-59ec-4fce-91e5-9992c662fdec\" src=\"/assets/img/titre_kidi_dep.jpg\" />

\t\t\t\t\t\t<div class=\"titre d-none d-lg-block\">Le meilleur des sorties pour enfants</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-sm-2 col-2 d-lg-none navbar-light bouton-burger\">
\t\t\t\t\t\t<button class=\"navbar-toggler collapsed icon-menu\" type=\"button\" data-toggle=\"collapse\" data-target=\"\" aria-controls=\"navbarCollapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t\t  <span class=\"icon\"></span>
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 130
        echo "
      </div>
      
\t\t\t  <div class=\"row  d-block d-lg-none logo-dep\">
\t\t\t\t<div class=\"titre\">Le meilleur des sorties pour enfants</div>
\t\t\t  </div>
\t\t\t  ";
        // line 136
        if ((($context["dep"] ?? null) != "0")) {
            // line 137
            echo "\t\t\t  <div class=\"row\" id=\"menu\">
\t\t\t\t  <div class=\"col-lg-12\">
\t\t\t\t\t  <nav class=\"navbar navbar-expand-lg  bg-white sticky-top justify-content-between navbar-light navbar-haut\">
              <div class=\"\" id=\"navbarCollapse\" style=\"\">
                <ul class=\"navbar-nav menu-user\">
                  <li class=\"nav-item user\">
\t\t\t\t\t  
                    ";
            // line 144
            if (($context["logged_in"] ?? null)) {
                // line 145
                echo "                      <a class=\"nav-link\"  href=\"/user/logout\"><i></i>Deconnexion</a>
                    ";
            } else {
                // line 147
                echo "\t\t\t\t\t\t <a class=\"nav-link use-ajax login-popup-form\"  href=\"/user/login\" data-dialog-type=\"modal\"
                       data-dialog-options='{\"width\":700,\"dialogClass\":\"user-login\"}'><i></i>Connexion</a><!--use-ajax fancy_login_show_popup--> 
                    ";
            }
            // line 150
            echo "                  </li>
                  <li class=\"nav-item coeur\">
                    <a class=\"nav-link\" href=\"#\"><i ></i>Favoris</a>
                  </li>
                  <li class=\"nav-item newsletter d-block d-lg-none\">
                    <a class=\"nav-link\" href=\"#\"><i ></i>Inscription à la newsletter</a>
                  </li>
                  <li class=\"nav-item change_dep\">
                    <select id=\"change_dep\">
                      ";
            // line 159
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["liste_dep"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["dep"]) {
                // line 160
                echo "                      <option value='";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"]), "html", null, true);
                echo "'>";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["dep"]), "html", null, true);
                echo "</option>
                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['dep'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 162
            echo "                    </select>
                  </li>
                  <li class=\"nav-item d-none d-lg-block\">
                    <form class=\"form-inline mt-2 mt-md-0 form-newsletter\" method=\"get\" action=\"/newsletter.html\">
                      <label class=\"sr-only\" for=\"input-newsletter\">Votre addresse email</label>
                      <input type=\"text\" class=\"\" id=\"input-newsletter\" placeholder=\"Votre addresse email\" name=\"email\">
                      <button type=\"submit\" class=\"btn-newsletter\">OK</button>
                    </form>
                  </li>
                  <li class=\"nav-item d-none d-lg-block\">
                    <form class=\"form-inline mt-2 mt-md-0 form-search\">
                      <input type=\"text\" class=\"\" id=\"input-search\" placeholder=\"Que recherchez-vous ?\">
                    </form>
                  </li>
                </ul>

                <div class=\"d-block d-lg-none menu-footer\">
                  ";
            // line 179
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_menu_mobil", [])), "html", null, true);
            echo "
                </div>

                <ul class=\"d-block d-lg-none reseaux-sociaux\">
                  ";
            // line 183
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["reseaux_sociaux"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["rs"]) {
                // line 184
                echo "                    <li class=\"nav-item\">
                      <a href=\"";
                // line 185
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["rs"], "link", [])), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["rs"], "social", [])), "html", null, true);
                echo "</a>
                    </li>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rs'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 188
            echo "                </ul>

              </div>
\t\t\t\t\t  </nav>
\t\t\t\t  </div>

\t\t\t  </div>
\t\t\t  ";
        }
        // line 196
        echo "\t\t  </div>

\t\t  ";
        // line 199
        echo "\t\t  ";
        if ($this->getAttribute(($context["page"] ?? null), "pub_entete", [])) {
            // line 200
            echo "\t\t\t<div class=\"col-lg-3 d-lg-block d-none\">
\t\t\t\t";
            // line 201
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "pub_entete", [])), "html", null, true);
            echo "
\t\t\t</div>
\t\t  ";
        }
        // line 204
        echo "
      </div>
      </div>
 </div>

  <div role=\"main\" class=\"main-container ";
        // line 209
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null)), "html", null, true);
        echo " js-quickedit-main-content\">


    <!-- moteur de recherche -->
    ";
        // line 213
        if ((($context["dep"] ?? null) != "0")) {
            // line 214
            echo "    <div class=\"row\">
\t\t<div class=\"col-12 form-search\">
\t\t\t";
            // line 216
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "moteur_recherche", [])), "html", null, true);
            echo "
\t\t</div>
    </div>
    ";
        }
        // line 220
        echo "
    <div class=\"row\">

\t\t  ";
        // line 224
        echo "      ";
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])) {
            // line 225
            echo "        ";
            $this->displayBlock('sidebar_first', $context, $blocks);
            // line 230
            echo "      ";
        }
        // line 231
        echo "
      ";
        // line 233
        echo "      ";
        // line 234
        $context["content_classes"] = [0 => ((($this->getAttribute(        // line 235
($context["page"] ?? null), "sidebar_first", []) && $this->getAttribute(($context["page"] ?? null), "sidebar_second", []))) ? ("col-sm-6") : ("")), 1 => ((($this->getAttribute(        // line 236
($context["page"] ?? null), "sidebar_first", []) && twig_test_empty($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])))) ? ("col-md-12 col-lg-9") : ("")), 2 => ((($this->getAttribute(        // line 237
($context["page"] ?? null), "sidebar_second", []) && twig_test_empty($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])))) ? ("col-md-12 col-lg-9") : ("")), 3 => (((twig_test_empty($this->getAttribute(        // line 238
($context["page"] ?? null), "sidebar_first", [])) && twig_test_empty($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])))) ? ("col-sm-12") : (""))];
        // line 241
        echo "


      <section";
        // line 244
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content_attributes"] ?? null), "addClass", [0 => ($context["content_classes"] ?? null)], "method")), "html", null, true);
        echo ">
\t\t  ";
        // line 245
        if ($this->getAttribute(($context["page"] ?? null), "zone_entete_national", [])) {
            // line 246
            echo "\t\t\t<div id=\"entete_national\" class=\"row mb-5\">
\t\t\t\t<div class=\"col-sm-1 col-lg-1 accueil\" style=\"\">
\t\t\t\t\t<a href=\"/\">
\t\t\t\t\tAccueil
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<div class=\"col-sm-11 col-lg-11 logo-national\">
\t\t\t\t\t";
            // line 254
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "zone_entete_national", [])), "html", null, true);
            echo "
\t\t\t\t</div>
\t\t\t</div>

\t\t  ";
        }
        // line 259
        echo "\t\t";
        if ($this->getAttribute(($context["page"] ?? null), "carte_france", [])) {
            // line 260
            echo "\t\t<div id=\"recherche_geo\" class=\"row mb-5 mb-lg-6\">
\t\t\t<div class=\"col-lg-6\">
\t\t\t\t";
            // line 262
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "carte_france", [])), "html", null, true);
            echo "
\t\t\t</div>
\t\t\t<div class=\"col-lg-6\">
\t\t\t\t";
            // line 265
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "recherche_geo", [])), "html", null, true);
            echo "
\t\t\t</div>
\t\t</div>
\t\t";
        }
        // line 269
        echo "        ";
        // line 270
        echo "        ";
        if ($this->getAttribute(($context["page"] ?? null), "highlighted", [])) {
            // line 271
            echo "          ";
            $this->displayBlock('highlighted', $context, $blocks);
            // line 274
            echo "        ";
        }
        // line 275
        echo "
        ";
        // line 277
        echo "        ";
        if (((($context["dep"] ?? null) != 0) && (($context["is_front"] ?? null) == 1))) {
            // line 278
            echo "        <h1>
        En ";
            // line 279
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["name_dep"] ?? null)), "html", null, true);
            echo ",<br>
        trouvez toutes les sorties à partager avec vos enfants
        </h1>
        ";
        }
        // line 283
        echo "        ";
        if ($this->getAttribute(($context["page"] ?? null), "help", [])) {
            // line 284
            echo "          ";
            $this->displayBlock('help', $context, $blocks);
            // line 287
            echo "        ";
        }
        // line 288
        echo "
        ";
        // line 290
        echo "        ";
        if ($this->getAttribute(($context["page"] ?? null), "content_article_accueil", [])) {
            // line 291
            echo "        <div id=\"articles_accueil\" >
\t\t\t";
            // line 292
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content_article_accueil", [])), "html", null, true);
            echo "
\t\t</div>

        ";
        }
        // line 296
        echo "
        ";
        // line 298
        echo "        ";
        $this->displayBlock('content', $context, $blocks);
        // line 305
        echo "      </section>

      ";
        // line 308
        echo "      ";
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])) {
            // line 309
            echo "        ";
            $this->displayBlock('sidebar_second', $context, $blocks);
            // line 316
            echo "      ";
        }
        // line 317
        echo "    </div>
  </div>
";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 104
    public function block_header($context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        // line 105
        echo "\t\t\t\t\t  <div class=\"col-lg-1 \" role=\"heading\">
\t\t\t\t\t\t";
        // line 106
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true);
        echo "
\t\t\t\t\t  </div>
\t\t\t\t\t";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 225
    public function block_sidebar_first($context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sidebar_first"));

        // line 226
        echo "          <aside class=\"col-md-3\" role=\"complementary\">
            ";
        // line 227
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])), "html", null, true);
        echo "
          </aside>
        ";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 271
    public function block_highlighted($context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "highlighted"));

        // line 272
        echo "            <div class=\"highlighted\">";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "highlighted", [])), "html", null, true);
        echo "</div>
          ";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 284
    public function block_help($context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "help"));

        // line 285
        echo "            ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "help", [])), "html", null, true);
        echo "
          ";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 298
    public function block_content($context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 299
        echo "          <a id=\"main-content\"></a>
          ";
        // line 300
        if ((($context["is_front"] ?? null) == 1)) {
            // line 301
            echo "          ";
        } else {
            // line 302
            echo "          ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true);
            echo "
          ";
        }
        // line 304
        echo "        ";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 309
    public function block_sidebar_second($context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sidebar_second"));

        // line 310
        echo "          <aside class=\"col-md-12 col-lg-3\" role=\"complementary\">


            ";
        // line 313
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])), "html", null, true);
        echo "
          </aside>
        ";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 328
    public function block_footer($context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 329
        echo "    <footer class=\"footer\" role=\"contentinfo\">
\t\t<div class=\"row no-gutters container\" style=\"margin: auto\">
\t\t\t<div class=\"col-md-10 d-sm-block d-md-block\">
\t\t\t\t";
        // line 332
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer", [])), "html", null, true);
        echo "
\t\t\t</div>
\t\t\t<div class=\"col-md-2 d-sm-block  d-md-block\">
\t\t\t\t<ul class=\"nav navbar\">
\t\t\t\t";
        // line 336
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["reseaux_sociaux"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rs"]) {
            // line 337
            echo "\t\t\t\t<li class=\"nav-item\">
          <a href=\"";
            // line 338
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["rs"], "link", [])), "html", null, true);
            echo "\">
\t\t\t\t\t";
            // line 339
            if (($this->getAttribute($context["rs"], "social", []) == "facebook")) {
                // line 340
                echo "\t\t\t\t\t<img src=\"/assets/img/FB.png\"/>
\t\t\t\t\t";
            } elseif (($this->getAttribute(            // line 341
$context["rs"], "social", []) == "twitter")) {
                // line 342
                echo "\t\t\t\t\t<img src=\"/assets/img/Twt.png\"/>
\t\t\t\t\t";
            } elseif (($this->getAttribute(            // line 343
$context["rs"], "social", []) == "instagram")) {
                // line 344
                echo "\t\t\t\t\t<img src=\"/assets/img/Insta.png\"/>
\t\t\t\t\t";
            } elseif (($this->getAttribute(            // line 345
$context["rs"], "social", []) == "pinterest")) {
                // line 346
                echo "\t\t\t\t\t<img src=\"/assets/img/Pin.png\"/>
\t\t\t\t\t";
            }
            // line 348
            echo "          </a>
\t\t\t\t\t</li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rs'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 351
        echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>

    </footer>
  ";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "themes/contrib/kidiklik/templates/system/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  698 => 351,  690 => 348,  686 => 346,  684 => 345,  681 => 344,  679 => 343,  676 => 342,  674 => 341,  671 => 340,  669 => 339,  665 => 338,  662 => 337,  658 => 336,  651 => 332,  646 => 329,  640 => 328,  630 => 313,  625 => 310,  619 => 309,  612 => 304,  606 => 302,  603 => 301,  601 => 300,  598 => 299,  592 => 298,  582 => 285,  576 => 284,  566 => 272,  560 => 271,  550 => 227,  547 => 226,  541 => 225,  531 => 106,  528 => 105,  522 => 104,  513 => 317,  510 => 316,  507 => 309,  504 => 308,  500 => 305,  497 => 298,  494 => 296,  487 => 292,  484 => 291,  481 => 290,  478 => 288,  475 => 287,  472 => 284,  469 => 283,  462 => 279,  459 => 278,  456 => 277,  453 => 275,  450 => 274,  447 => 271,  444 => 270,  442 => 269,  435 => 265,  429 => 262,  425 => 260,  422 => 259,  414 => 254,  404 => 246,  402 => 245,  398 => 244,  393 => 241,  391 => 238,  390 => 237,  389 => 236,  388 => 235,  387 => 234,  385 => 233,  382 => 231,  379 => 230,  376 => 225,  373 => 224,  368 => 220,  361 => 216,  357 => 214,  355 => 213,  348 => 209,  341 => 204,  335 => 201,  332 => 200,  329 => 199,  325 => 196,  315 => 188,  304 => 185,  301 => 184,  297 => 183,  290 => 179,  271 => 162,  260 => 160,  256 => 159,  245 => 150,  240 => 147,  236 => 145,  234 => 144,  225 => 137,  223 => 136,  215 => 130,  202 => 119,  195 => 114,  192 => 113,  190 => 112,  186 => 110,  183 => 109,  180 => 104,  177 => 103,  170 => 97,  164 => 96,  156 => 91,  152 => 89,  149 => 88,  143 => 85,  140 => 84,  137 => 83,  133 => 80,  124 => 74,  121 => 73,  118 => 72,  114 => 69,  108 => 67,  106 => 66,  101 => 65,  99 => 62,  98 => 61,  97 => 59,  95 => 58,  89 => 57,  80 => 358,  76 => 328,  74 => 327,  71 => 326,  65 => 323,  62 => 322,  60 => 321,  57 => 320,  55 => 96,  52 => 94,  48 => 57,  46 => 56,  44 => 54,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/kidiklik/templates/system/page.html.twig", "/var/www/html/web/themes/contrib/kidiklik/templates/system/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 54, "if" => 56, "block" => 57, "for" => 159];
        static $filters = ["escape" => 323, "clean_class" => 62, "t" => 74];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block', 'for'],
                ['escape', 'clean_class', 't'],
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
