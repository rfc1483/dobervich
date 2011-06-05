<?php

/* CompanyBlogBundle:Blog:index.html.twig */
class __TwigTemplate_283844f6558bc0231216bba3bdad0af6 extends Twig_Template
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
        echo "    symfony2 Blog Tutorial | Home
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    <h2>Welcome to the Blog!</h2>
";
    }

    public function getTemplateName()
    {
        return "CompanyBlogBundle:Blog:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
