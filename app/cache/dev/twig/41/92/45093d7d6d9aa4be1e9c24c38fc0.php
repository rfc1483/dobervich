<?php

/* CompanyBlogBundle::layout.html.twig */
class __TwigTemplate_419245093d7d6d9aa4be1e9c24c38fc0 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
            'sidebar' => array($this, 'block_sidebar'),
            'body' => array($this, 'block_body'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("::base.html.twig");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/companyblog/css/blog.css"), "html");
        echo "\" media=\"screen\" />
";
    }

    // line 25
    public function block_content($context, array $blocks = array())
    {
        echo "No content.";
    }

    // line 28
    public function block_sidebar($context, array $blocks = array())
    {
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "    <div id=\"container\">
        <header class=\"clearfix\">
            <h1>
                symfony2 Blog Tutorial
            </h1>
            <nav>
                <ul>
                    <li>
                        <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("show_page", array("page" => "about")), "html");
        echo "\">
                            About
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class=\"clearfix\">
            <div id=\"content\">
                ";
        // line 25
        $this->displayBlock('content', $context, $blocks);
        // line 26
        echo "            </div>
            <div id=\"sidebar\">
                ";
        // line 28
        $this->displayBlock('sidebar', $context, $blocks);
        // line 29
        echo "            </div>
        </div>
        <footer class=\"clearfix\">
            <p class=\"symfony2\">
                Powered by <a href=\"http://www.symfony.com\" target=\"_blank\">Symfony</a>
            </p>
            <p class=\"copy\">
                &copy; Company 2011
            </p>
        </footer>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CompanyBlogBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
