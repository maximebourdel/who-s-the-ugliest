<?php
// src/Sdz/BlogBundle/DataFixtures/ORM/Categories.php

namespace Sdz\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Perso\UgliestBundle\Entity\Person;

use Perso\UgliestBundle\Entity\Photo;

class Articles implements FixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load (ObjectManager $manager)
    {
        
        $name = array(
                'Bourdel',
                'Carnot',
                'Josselin',
                'Gautier',
                'Morin'
        );
        $surname = array(
                'Maxime',
                'Brendan',
                'Samuel',
                'Thibault',
                'Mehdi'
        );
        
        for ($i = 0; $i < sizeof($name) ; $i ++) {
            // On crée la catégorie
        
            $photo= new Photo();
            $photo->setUrl("png");
            $photo->setAlt($name[$i]);
        
            // On la persiste
            $manager->persist($photo);
            
            $person = new Person();
            $person->setName($name[$i]);
            $person->setName($name[$i]);
            $person->setPhoto($photo);
            $person->setSurname($surname[$i]);
            $person->setPoints(0);
            
            // On la persiste
            $manager->persist($person);
            
            
            
        }
        
        
       
        
        
       
        
        // On déclenche l'enregistrement
        $manager->flush();
    }
}