<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('BlogBundle:Default:contact.html.twig');
    }

    /**
     * @Route("/article/{id}", name="article")
     */
    public function articleAction($id)
    {
        $em = $this->container->get("doctrine")->getManager();
        $article = $em->getRepository("BlogBundle:Article")->findOneById($id);
        return $this->render('BlogBundle:Default:article.html.twig', array("article" => $article));
    }
}
