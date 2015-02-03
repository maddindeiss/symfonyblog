<?php

/* AppBundle:Blog:show.html.twig */
class __TwigTemplate_c7c7ddc0132d29baab64b6b6e42b406f84446c0966a52c1653d9ae70bdc9ccc4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        try {
            $this->parent = $this->env->loadTemplate("AppBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(2);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AppBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "title", array()), "html", null, true);
    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "    <article class=\"blog\">
        <header>
            <div class=\"date\"><time datetime=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "created", array()), "c"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "created", array()), "l, F j, Y"), "html", null, true);
        echo "</time></div>
            <h2>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "title", array()), "html", null, true);
        echo "</h2>
        </header>
        <img src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(twig_join_filter(array(0 => "images/", 1 => $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "image", array())))), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "title", array()), "html", null, true);
        echo " image not found\" class=\"large\" />
        <div>
            <p>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "blog", array()), "html", null, true);
        echo "</p>
        </div>
    </article>
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Blog:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 14,  61 => 12,  56 => 10,  50 => 9,  46 => 7,  43 => 6,  37 => 4,  11 => 2,);
    }
}
