<?php

/* CompanyBlogBundle:Blog:post.html.twig */
class __TwigTemplate_ebd12e7a9f99c315a2a5b2ee16689d68 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<div class=\"post\">
    <h2 class=\"post_title\">
        ";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'post'), "title", array(), "any", false), "html");
        echo "
    </h2>
    <p class=\"post_info\">
        by ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'post'), "user", array(), "any", false), "fullName", array(), "any", false), "html");
        echo " on ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->getAttribute($this->getContext($context, 'post'), "createdAt", array(), "any", false), "F jS, Y"), "html");
        echo "
    </p>
    <p class=\"post_body\">
        ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'post'), "content", array(), "any", false), "html");
        echo "
    </p>
    ";
        // line 11
        $this->env->loadTemplate("CompanyBlogBundle:Blog:tags.html.twig")->display(array_merge($context, array("tags" => $this->getAttribute($this->getContext($context, 'post'), "tags", array(), "any", false))));
        // line 12
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "CompanyBlogBundle:Blog:post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
