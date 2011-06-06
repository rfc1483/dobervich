<?php

namespace Company\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller {

    public function indexAction() {
        return $this->render('CompanyBlogBundle:Admin:index.html.twig');
    }

}