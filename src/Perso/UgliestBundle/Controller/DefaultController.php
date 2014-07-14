<?php

namespace Perso\UgliestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PersoUgliestBundle:Default:index.html.twig');
    }
    
    public function compareAction()
    {
        // On récupère les articleCompetence pour l'article $article
        $list_persons = $this->getDoctrine ()->getManager ()->getRepository ( 'PersoUgliestBundle:Person' )->findAll();
    
        // Puis modifiez la ligne du render comme ceci, pour prendre en compte les variables :
        return $this->render ( 'PersoUgliestBundle:Default:compare.html.twig', array (
                    'list_persons' => $list_persons
               ) );
    }
}
