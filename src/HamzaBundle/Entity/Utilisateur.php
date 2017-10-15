<?php

namespace HamzaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use HamzaBundle\Entity\Utilisateur;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="HamzaBundle\Repository\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=255)
     */
    private $fname;


    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=255, unique=true)
     */
    private $lname;


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
     * Get Lastname
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lname;
    }

    /**
     * Get Firstname
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->fname;
    }

    /**
     * Set LastName
     *
     * @param string $name
     * @return Utilisateur
     */
    public function setLastName($name)
    {
        $this->lname = $name;

        return $this;
    }

    /**
     * Set FirstName
     *
     * @param string $name
     * @return Utilisateur
     */
    public function setFirstName($name)
    {
        $this->fname = $name;

        return $this;
    }



}
