<?php

namespace Company\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller {

    public function indexAction() {
        $em = $this->get('doctrine')->getEntityManager();
        $posts = $em->getRepository('Company\BlogBundle\Entity\Post')->getLatestPosts();

        return $this->render(
                'CompanyBlogBundle:Blog:index.html.twig', array(
            'posts' => $posts
                )
        );
    }

}