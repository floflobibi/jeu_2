<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    private $nom;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Parties", mappedBy="joueur1")
     */
    private $parties_1;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Parties", mappedBy="joueur2")
     */
    private $parties_2;
    private $parties;

    public function __construct()
    {
        parent::__construct();
        $this->parties_1 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->parties_2 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->parties = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function getParties()
    {
        if (count($this->parties_1) > 0)
            $this->parties[] = $this->parties_1;
        if (count($this->parties_2) > 0)
            $this->parties[] = $this->parties_2;
        return $this->parties;
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }
    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * Add parties1
     *
     * @param \AppBundle\Entity\Parties $parties1
     *
     * @return User
     */
    public function addParties1(\AppBundle\Entity\Parties $parties1)
    {
        $this->parties_1[] = $parties1;
        return $this;
    }
    /**
     * Remove parties1
     *
     * @param \AppBundle\Entity\Parties $parties1
     */
    public function removeParties1(\AppBundle\Entity\Parties $parties1)
    {
        $this->parties_1->removeElement($parties1);
    }
    /**
     * Get parties1
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParties1()
    {
        return $this->parties_1;
    }
    /**
     * Add parties2
     *
     * @param \AppBundle\Entity\Parties $parties2
     *
     * @return User
     */
    public function addParties2(\AppBundle\Entity\Parties $parties2)
    {
        $this->parties_2[] = $parties2;
        return $this;
    }
    /**
     * Remove parties2
     *
     * @param \AppBundle\Entity\Parties $parties2
     */
    public function removeParties2(\AppBundle\Entity\Parties $parties2)
    {
        $this->parties_2->removeElement($parties2);
    }
    /**
     * Get parties2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParties2()
    {
        return $this->parties_2;
    }
    /**
     * @var int
     *
     * @ORM\Column(name="cumul_points", type="integer")
     */
    private $cumulPoints = 0;

    /**
     * Set cumulPoints
     *
     * @param integer $cumulPoints
     *
     * @return User
     */
    public function setCumulPoints($cumulPoints)
    {
        $this->cumulPoints = $cumulPoints;
        return $this;
    }

    /**
     * Get cumulPoints
     *
     * @return int
     */
    public function getCumulPoints()
    {
        return $this->cumulPoints;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="partiesGagnees", type="integer")
     */
    private $partiesGagnees = 0;

    /**
     * Set partiesGagnees
     *
     * @param integer $partiesGagnees
     *
     * @return User
     */
    public function setpartiesGagnees($partiesGagnees)
    {
        $this->partiesGagnees = $partiesGagnees;
        return $this;
    }

    /**
     * Get partiesGagnees
     *
     * @return int
     */
    public function getpartiesGagnees()
    {
        return $this->partiesGagnees;
    }

}