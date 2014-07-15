<?php

namespace Perso\UgliestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Perso\UgliestBundle\Entity\Person;


use Perso\UgliestBundle\Form\PersonType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PersoUgliestBundle:Default:index.html.twig');
    }
    
    public function createAction()
    {
       
		$person = new Person ();
		
		// On crée le formulaire grâce à l'ArticleType
		$form = $this->createForm ( new PersonType (), $person );
		
		// On récupère la requête
		$request = $this->getRequest ();
		
		// On vérifie qu'elle est de type POST
		if ($request->getMethod () == 'POST') {
			// On fait le lien Requête <-> Formulaire
			$form->bind ( $request );
			
			// On vérifie que les valeurs entrées sont correctes
			// (Nous verrons la validation des objets en détail dans le prochain chapitre)
			if ($form->isValid ()) {
				// On enregistre notre objet $article dans la base de données
				$em = $this->getDoctrine ()->getManager ();
				$em->persist ( $person );
				$em->flush ();
				
				// On définit un message flash
				$this->get ( 'session' )->getFlashBag ()->add ( 'info', 'Congratulations, user added !' );
				
				// On redirige vers la page de visualisation de l'article nouvellement créé
				return $this->redirect ( $this->generateUrl ( 'perso_ugliest_compare' ) );
			}
		}
		
		// À ce stade :
		// - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
		// - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
		
		return $this->render ( 'PersoUgliestBundle:Default:create.html.twig', array (
				'form' => $form->createView () 
		) );
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
