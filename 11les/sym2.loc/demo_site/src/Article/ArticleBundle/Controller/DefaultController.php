<?php

namespace Article\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ArticleArticleBundle:Default:index.html.twig', array('name' => $name));
    }
}
