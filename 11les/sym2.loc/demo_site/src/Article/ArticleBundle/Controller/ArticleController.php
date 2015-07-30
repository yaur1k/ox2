<?php

namespace Article\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function articleAction($myVariable)
    {
        return $this->render('ArticleArticleBundle:MyTempl:article.html.twig', array(
		'hellovar' => $myVariable
		));
		
    }
}
