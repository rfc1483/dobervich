<?php

/* CompanyBlogBundle:Blog:tags.html.twig */
class __TwigTemplate_52be5199ea3ddb0aa2d43c30ad6047f2 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<ul class=\"post_tags\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'tags'));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context['_key'] => $context['tag']) {
            // line 3
            echo "        <li>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'tag'), "name", array(), "any", false), "html");
            echo "</li>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 5
            echo "        <li>No tags found.</li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 7
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "CompanyBlogBundle:Blog:tags.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
