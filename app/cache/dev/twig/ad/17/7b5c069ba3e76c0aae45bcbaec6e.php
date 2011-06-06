<?php

/* CompanyBlogBundle:Security:login.html.twig */
class __TwigTemplate_ad177b5c069ba3e76c0aae45bcbaec6e extends Twig_Template
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
        echo "    symfony2 Blog Tutorial | Login
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        if ($this->getContext($context, 'error')) {
            // line 9
            echo "        <div class=\"error\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'error'), "message", array(), "any", false), "html");
            echo "</div>
    ";
        }
        // line 11
        echo "    <form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("security_check"), "html");
        echo "\" method=\"POST\">
        <table>
            <tr>
                <td>
                    <label for=\"username\">Username:</label>
                </td>
                <td>
                    <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, 'last_username'), "html");
        echo "\" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for=\"password\">Password:</label>
                </td>
                <td>
                    <input type=\"password\" id=\"password\" name=\"_password\" />
                </td>
            </tr>
        </table>
        <input type=\"submit\" name=\"login\" value=\"submit\" />
    </form>
";
    }

    public function getTemplateName()
    {
        return "CompanyBlogBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
