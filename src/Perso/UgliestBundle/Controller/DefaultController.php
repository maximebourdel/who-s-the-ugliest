<?php

namespace Perso\UgliestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PersoUgliestBundle:Default:index.html.twig', array('name' => $name));
    }
}
