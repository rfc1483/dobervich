<?php

/* CompanyBlogBundle:Admin:index.html.twig */
class __TwigTemplate_1e635121604723bd7cc9e64e0c7d8e88 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("CompanyBlogBundle::layout.html.twig");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "    symfony2 Blog Tutorial | Admin | Home
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    <h2>
        Welcome to the Admin Homepage ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "user", array(), "any", false), "username", array(), "any", false), "html");
        echo "!
    </h2>
";
    }

    public function getTemplateName()
    {
        return "CompanyBlogBundle:Admin:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
