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

/* @webprofiler/Collector/database.html.twig */
class __TwigTemplate_d925fb30b67e79554fc4945d3be5eaf8eba6d36c7bafa42e9388df46c075cd5a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'toolbar' => [$this, 'block_toolbar'],
            'panel' => [$this, 'block_panel'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@webprofiler/Collector/database.html.twig"));

        // line 1
        $this->displayBlock('toolbar', $context, $blocks);
        // line 33
        echo "
";
        // line 34
        $this->displayBlock('panel', $context, $blocks);
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 1
    public function block_toolbar($context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        // line 2
        echo "    ";
        ob_start(function () { return ''; });
        // line 3
        echo "    <a href=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("webprofiler.dashboard", ["profile" => ($context["token"] ?? null)], ["fragment" => "database"]), "html", null, true);
        echo "\" title=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Database"));
        echo "\">
        <img width=\"20\" height=\"28\" alt=\"";
        // line 4
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Database"));
        echo "\"
             src=\"data:image/png;base64,";
        // line 5
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["collector"] ?? null), "icon", [])), "html", null, true);
        echo "\"/>
        <span class=\"sf-toolbar-info-piece-additional sf-toolbar-status sf-toolbar-status-";
        // line 6
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["collector"] ?? null), "colorCode", [])), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["collector"] ?? null), "querycount", [])), "html", null, true);
        echo "</span>
        ";
        // line 7
        if (($this->getAttribute(($context["collector"] ?? null), "querycount", []) > 0)) {
            // line 8
            echo "            <span class=\"sf-toolbar-info-piece-additional-detail\">in ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, sprintf("%0.2f ms", $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["collector"] ?? null), "time", []))), "html", null, true);
            echo "</span>
        ";
        }
        // line 10
        echo "    </a>
    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 12
        echo "    ";
        ob_start(function () { return ''; });
        // line 13
        echo "    <div class=\"sf-toolbar-info-piece\">
        <b>";
        // line 14
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("DB Queries"));
        echo "</b>
        <span>";
        // line 15
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["collector"] ?? null), "querycount", [])), "html", null, true);
        echo "</span>
    </div>
    <div class=\"sf-toolbar-info-piece\">
        <b>";
        // line 18
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Query time"));
        echo "</b>
        <span>";
        // line 19
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, sprintf("%0.2f ms", $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["collector"] ?? null), "time", []))), "html", null, true);
        echo "</span>
    </div>
    <div class=\"sf-toolbar-info-piece\">
        <b>";
        // line 22
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Default database"));
        echo "</b>
        <span>";
        // line 23
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["collector"] ?? null), "database", []), "driver", [])), "html", null, true);
        echo "://";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["collector"] ?? null), "database", []), "host", [])), "html", null, true);
        echo ":";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["collector"] ?? null), "database", []), "port", [])), "html", null, true);
        echo "
            /";
        // line 24
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["collector"] ?? null), "database", []), "database", [])), "html", null, true);
        echo "</span>
    </div>
    ";
        $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 27
        echo "
    <div class=\"sf-toolbar-block\">
        <div class=\"sf-toolbar-icon\">";
        // line 29
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (((isset($context["icon"]) || array_key_exists("icon", $context))) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["icon"] ?? null)), "")) : ("")), "html", null, true);
        echo "</div>
        <div class=\"sf-toolbar-info\">";
        // line 30
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (((isset($context["text"]) || array_key_exists("text", $context))) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["text"] ?? null)), "")) : ("")), "html", null, true);
        echo "</div>
    </div>
";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    // line 34
    public function block_panel($context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 35
        echo "    <script id=\"database\" type=\"text/template\">
        <h2 class=\"panel__title\">";
        // line 36
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Database"));
        echo "</h2>

        <form class=\"panel__toolbar\">
            <div class=\"panel__filter--text\">
                <input id=\"edit-caller\" class=\"js--live-filter\" placeholder=\"";
        // line 40
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Caller"));
        echo "\" type=\"text\"/>
                <label for=\"edit-caller\" class=\"panel__filter-label\">";
        // line 41
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Caller"));
        echo "</label>
            </div>
            <div class=\"panel__filter--select\">
                <select id=\"edit-type\" class=\"js--live-filter\">
                    <option value=\"\">";
        // line 45
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Any"));
        echo "</option>
                    <option value=\"select\">Select</option>
                    <option value=\"insert\">Insert</option>
                    <option value=\"update\">Update</option>
                    <option value=\"create\">Create</option>
                    <option value=\"delete\">Delete</option>
                </select>
                <label for=\"edit-type\" class=\"panel__filter-label\">";
        // line 52
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Query type"));
        echo "</label>
            </div>
            <div class=\"panel__filter--select\">
                <select id=\"edit-hightlighted\" class=\"js--live-filter\">
                    <option value=\"\">";
        // line 56
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Any"));
        echo "</option>
                    <option value=\"1\">";
        // line 57
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Yes"));
        echo "</option>
                    <option value=\"0\">";
        // line 58
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("No"));
        echo "</option>
                </select>
                <label for=\"edit-type\" class=\"panel__filter-label\">";
        // line 60
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Slow queries"));
        echo "</label>
            </div>
            <div class=\"panel__filter--select\">
                <select id=\"edit-database\" class=\"js--live-filter\">
                    <option value=\"\">";
        // line 64
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Any"));
        echo "</option>
                    <% _.each(data.connections, function( item ){ %>
                        <option value=\"<%- item %>\"><%- item %></option>
                    <% }) %>
                </select>
                <label for=\"edit-database\" class=\"panel__filter-label\">";
        // line 69
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Database"));
        echo "</label>
            </div>

            <div class=\"button--flat l-right js--code-toggle--global js--placeholder-visible\">";
        // line 72
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Swap Placeholders"));
        echo "</div>

        </form>

        <% _.each( data.queries, function( item, key ){ %>
        <div class=\"panel__container<% if (item.time > data.query_highlight_threshold) { %> is--hightlighted <% } %>\"
             data-wp-caller=\"<%- item.caller.class != null ? item.caller.class.toLowerCase() : '' %>\"
             data-wp-database=\"<%- item.database %>\"
             data-wp-type=\"<%- item.type %>\"
             data-wp-hightlighted=\"<%- (item.time > data.query_highlight_threshold) ? '1' : '0' %>\">
            <div class=\"panel__expand-header \">
                    <pre <% if( item.query_args) { %> class=\"js--code-target\"<% } %> >
                        <code class=\"sql js--placeholder-query\">
                            <%- item.query %>
                        </code>
                        <% if( item.query_args) { %>
                        <code class=\"sql js--clipboard-target is--hidden js--original-query\">
                            <%- item.query_args %>
                        </code>
                        <% } %>
                    </pre>
                <ul class=\"list--inline\">
                    <li><b>";
        // line 94
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Time"));
        echo "</b>: <%- Drupal.webprofiler.helpers.printTime(item.time) %></li>
                    <li><b>";
        // line 95
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Caller"));
        echo "</b>: <%= Drupal.webprofiler.helpers.classLink({\"file\" : item.caller.file,
                        \"class\" : item.caller.class, \"line\" : item.caller.line, \"method\" : item.caller.function}) %>
                    </li>
                    <li><b>";
        // line 98
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Database"));
        echo "</b>: <%- item.database %></li>
                    <li><b>";
        // line 99
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Target"));
        echo "</b>: <%- item.target %></li>
                </ul>

                <% if(item.query_args){ %>
                <div class=\"button--flat l-right js--code-toggle\">";
        // line 103
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Swap Placeholders"));
        echo "</div>
                <% } %>
                <% if(item.args){ %>
                <div class=\"button--flat l-right js--panel-toggle\">";
        // line 106
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Info"));
        echo "</div>
                <% } %>
                <!--div class=\"button--flat l-right js--clipboard-trigger\">";
        // line 108
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Copy Query"));
        echo "</div-->
                <% if(item.explain){ %>
                <div class=\"button--flat l-right js--explain-trigger\"
                     data-wp-queryPosition=\"<%- key %>\"
                        >";
        // line 112
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Explain"));
        echo "</div>
                <% } %>
            </div>

            <% if(item.explain){ %>
            <div class=\"loader--linear js--loader\" style=\"display: none\">
                <div class=\"loader__bar\"></div>
                <div class=\"loader__bar\"></div>
                <div class=\"loader__bar\"></div>
            </div>
            <div class=\"panel__expand-content js--explain-target\"></div>
            <% } %>

            <% if(item.args){ %>
            <div class=\"panel__expand-content\">
                <div class=\"wp-query-arguments\">
                    <table class=\"table--duo\">
                        <thead>
                        <tr>
                            <th>";
        // line 131
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("placeholder"));
        echo "</th>
                            <th>";
        // line 132
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("value"));
        echo "</th>
                        </tr>
                        </thead>
                        <tbody>
                        <% _.each( item.args, function( item, key ){ %>
                        <tr>
                            <td><%- key %></td>
                            <td><%= Drupal.webprofiler.helpers.frm(item) %></td>
                        </tr>
                        <% }); %>
                        </tbody>
                    </table>
                </div>
            </div>
            <% } %>
        </div>
        <% }); %>
    </script>
    <script id=\"wp-query-explain-template\" type=\"text/template\">
        <table class=\"table--compact\">
            <thead>
            <tr>
                <% _.each(rc.data[1], function(value, key, list) { %>
                <th><%= key %></th>
                <% }); %>
            </tr>
            </thead>
            <% _.each(rc.data, function(value) { %>
            <tr>
                <% _.each(value, function(value2, key, list) { %>
                <td><%= value2 %></td>
                <% }); %>
            </tr>
            <% }); %>
        </table>
    </script>
";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "@webprofiler/Collector/database.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  321 => 132,  317 => 131,  295 => 112,  288 => 108,  283 => 106,  277 => 103,  270 => 99,  266 => 98,  260 => 95,  256 => 94,  231 => 72,  225 => 69,  217 => 64,  210 => 60,  205 => 58,  201 => 57,  197 => 56,  190 => 52,  180 => 45,  173 => 41,  169 => 40,  162 => 36,  159 => 35,  153 => 34,  143 => 30,  139 => 29,  135 => 27,  129 => 24,  121 => 23,  117 => 22,  111 => 19,  107 => 18,  101 => 15,  97 => 14,  94 => 13,  91 => 12,  87 => 10,  81 => 8,  79 => 7,  73 => 6,  69 => 5,  65 => 4,  58 => 3,  55 => 2,  49 => 1,  42 => 34,  39 => 33,  37 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@webprofiler/Collector/database.html.twig", "/var/www/html/web/modules/contrib/devel/webprofiler/templates/Collector/database.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["block" => 1, "set" => 2, "if" => 7];
        static $filters = ["escape" => 3, "t" => 3, "format" => 8, "default" => 29];
        static $functions = ["url" => 3];

        try {
            $this->sandbox->checkSecurity(
                ['block', 'set', 'if'],
                ['escape', 't', 'format', 'default'],
                ['url']
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
