<?php

namespace Perso\UgliestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


use Symfony\Component\Validator\Constraints as Assert;

/**
 * Person
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Perso\UgliestBundle\Entity\PersonRepository")
 * @UniqueEntity(fields={"surname","name"})
 */
class Person
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @ORM\Column(unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     * @ORM\Column(unique=true)
     */
    private $surname;

    /**
     * @var array
     *
     * @ORM\Column(name="category", type="array")
     */
    private $category;

    /**
     * @ORM\OneToOne(targetEntity="Perso\UgliestBundle\Entity\Photo", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $photo;

    /**
     * @var int
     *
     * @ORM\Column(name="points", type="integer", options={"default":0})
     */
    private $points;
    
    
    
    // Et modifions le constructeur pour mettre cet attribut publication à true par défaut
    public function __construct()
    {
        $this->category = array();
        $this->points = 0;
    }
    
    
    
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Person
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Person
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    
        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set category
     *
     * @param array $category
     * @return Person
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return array 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Person
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    
        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }
    
    /**
     * Set points
     *
     * @param string $points
     * @return Person
     */
    public function setPoints($points)
    {
        $this->points = $points;
    
        return $this;
    }
    
    /**
     * Get points
     *
     * @return int
     */
    public function getPoints()
    {
        return $this->points;
    }
    
    /**
     * Increase points
     *
     * @return Person
     */
    public function increasePoints()
    {
       $this->points++;
       
       return $this;
    }
}
