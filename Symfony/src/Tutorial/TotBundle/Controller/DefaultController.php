<?php

namespace Tutorial\TotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TutorialTotBundle:Default:index.html.twig', array('name' => $name));
    }
}
