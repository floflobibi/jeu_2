<?php
/**
 * Created by PhpStorm.
 * User: Florine
 * Date: 24/03/2017
 * Time: 08:50
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Parties
 *
 * @ORM\Table(name="parties")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartiesRepository")
 */
class Parties
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut", type="datetime")
     */
    private $debut;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin", type="datetime",nullable=true)
     */
    private $fin;
    /**
     * @var int
     *
     * @ORM\Column(name="point_j1", type="integer")
     */
    private $pointJ1 = 0;
    /**
     * @var int
     *
     * @ORM\Column(name="point_j1_cat1", type="integer")
     */
    private $pointJ1_cat1 = 0;
    /**
     * @var int
     *
     * @ORM\Column(name="point_j1_cat2", type="integer")
     */
    private $pointJ1_cat2 = 0;
    /**
     * @var int
     *
     * @ORM\Column(name="point_j1_cat3", type="integer")
     */
    private $pointJ1_cat3 = 0;
    /**
     * @var int
     *
     * @ORM\Column(name="point_j1_cat4", type="integer")
     */
    private $pointJ1_cat4 = 0;
    /**
     * @var int
     *
     * @ORM\Column(name="point_j1_cat5", type="integer")
     */
    private $pointJ1_cat5 = 0;
    /**
     * @var int
     *
     * @ORM\Column(name="point_j2", type="integer")
     */
    private $pointJ2 = 0;
    /**
     * @var int
     *
     * @ORM\Column(name="point_j2_cat1", type="integer")
     */
    private $pointJ2_cat1 = 0;
    /**
     * @var int
     *
     * @ORM\Column(name="point_j2_cat2", type="integer")
     */
    private $pointJ2_cat2 = 0;
    /**
     * @var int
     *
     * @ORM\Column(name="point_j2_cat3", type="integer")
     */
    private $pointJ2_cat3 = 0;
    /**
     * @var int
     *
     * @ORM\Column(name="point_j2_cat4", type="integer")
     */
    private $pointJ2_cat4 = 0;
    /**
     * @var int
     *
     * @ORM\Column(name="point_j2_cat5", type="integer")
     */
    private $pointJ2_cat5 = 0;
    /**
     * @var int
     *
     * @ORM\Column(name="tourde", type="integer")
     */
    private $tourde = 1;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="parties_1", fetch="EAGER")
     */
    private $joueur1;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="parties_2", fetch="EAGER")
     */

    private $joueur2;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Situation", inversedBy="partie")
     */
    private $situation;

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
     * Set debut
     *
     * @param \DateTime $debut
     *
     * @return Parties
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;
        return $this;
    }
    /**
     * Get debut
     *
     * @return \DateTime
     */
    public function getDebut()
    {
        return $this->debut;
    }
    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return Parties
     */
    public function setFin($fin)
    {
        $this->fin = $fin;
        return $this;
    }
    /**
     * Get fin
     *
     * @return \DateTime
     */
    public function getFin()
    {
        return $this->fin;
    }
    /**
     * Set pointJ1
     *
     * @param integer $pointJ1
     *
     * @return Parties
     */
    public function setPointJ1($pointJ1)
    {
        $this->pointJ1 = $pointJ1;
        return $this;
    }
    /**
     * Get pointJ1
     *
     * @return int
     */
    public function getPointJ1()
    {
        return $this->pointJ1;
    }
    /////////////////////////////////////////////////////////////
    /**
     * Set pointJ1_cat1
     *
     * @param integer $pointJ1_cat1
     *
     * @return Parties
     */
    public function setPointJ1_cat1($pointJ1_cat1)
    {
        $this->pointJ1_cat1 = $pointJ1_cat1;
        return $this;
    }
    /**
     * Get pointJ1_cat1
     *
     * @return int
     */
    public function getPointJ1_cat1()
    {
        return $this->pointJ1_cat1;
    }
    ///////////
    /**
     * Set pointJ1_cat2
     *
     * @param integer $pointJ1_cat2
     *
     * @return Parties
     */
    public function setPointJ1_cat2($pointJ1)
    {
        $this->pointJ1_cat2 = $pointJ1;
        return $this;
    }
    /**
     * Get pointJ1_cat2
     *
     * @return int
     */
    public function getPointJ1_cat2()
    {
        return $this->pointJ1_cat2;
    }
    //////////
    /**
     * Set pointJ1_cat3
     *
     * @param integer $pointJ1_cat3
     *
     * @return Parties
     */
    public function setPointJ1_cat3($pointJ1)
    {
        $this->pointJ1_cat3 = $pointJ1;
        return $this;
    }
    /**
     * Get pointJ1_cat3
     *
     * @return int
     */
    public function getPointJ1_cat3()
    {
        return $this->pointJ1_cat3;
    }
    //////////
    /**
     * Set pointJ1_cat4
     *
     * @param integer $pointJ1_cat4
     *
     * @return Parties
     */
    public function setPointJ1_cat4($pointJ1)
    {
        $this->pointJ1_cat4 = $pointJ1;
        return $this;
    }
    /**
     * Get pointJ1_cat4
     *
     * @return int
     */
    public function getPointJ1_cat4()
    {
        return $this->pointJ1_cat4;
    }
    //////////
    /**
     * Set pointJ1_cat5
     *
     * @param integer $pointJ1_cat5
     *
     * @return Parties
     */
    public function setPointJ1_cat5($pointJ1)
    {
        $this->pointJ1_cat5 = $pointJ1;
        return $this;
    }
    /**
     * Get pointJ1_cat5
     *
     * @return int
     */
    public function getPointJ1_cat5()
    {
        return $this->pointJ1_cat5;
    }
    //////////
    /////////////////////////////////////////////////////////////
    /**
     * Set pointJ2_cat1
     *
     * @param integer $pointJ2_cat1
     *
     * @return Parties
     */
    public function setPointJ2_cat1($pointJ2)
    {
        $this->pointJ2_cat1 = $pointJ2;
        return $this;
    }
    /**
     * Get pointJ2_cat1
     *
     * @return int
     */
    public function getPointJ2_cat1()
    {
        return $this->pointJ2_cat1;
    }
    ///////////
    /**
     * Set pointJ2_cat2
     *
     * @param integer $pointJ2_cat2
     *
     * @return Parties
     */
    public function setPointJ2_cat2($pointJ2)
    {
        $this->pointJ2_cat2 = $pointJ2;
        return $this;
    }
    /**
     * Get pointJ2_cat2
     *
     * @return int
     */
    public function getPointJ2_cat2()
    {
        return $this->pointJ2_cat2;
    }
    //////////
    /**
     * Set pointJ2_cat3
     *
     * @param integer $pointJ2_cat3
     *
     * @return Parties
     */
    public function setPointJ2_cat3($pointJ1)
    {
        $this->pointJ2_cat3 = $pointJ1;
        return $this;
    }
    /**
     * Get pointJ2_cat3
     *
     * @return int
     */
    public function getPointJ2_cat3()
    {
        return $this->pointJ2_cat3;
    }
    //////////
    /**
     * Set pointJ2_cat4
     *
     * @param integer $pointJ2_cat4
     *
     * @return Parties
     */
    public function setPointJ2_cat4($pointJ1)
    {
        $this->pointJ2_cat4 = $pointJ1;
        return $this;
    }
    /**
     * Get pointJ2_cat4
     *
     * @return int
     */
    public function getPointJ2_cat4()
    {
        return $this->pointJ2_cat4;
    }
    //////////
    /**
     * Set pointJ2_cat5
     *
     * @param integer $pointJ2_cat5
     *
     * @return Parties
     */
    public function setPointJ2_cat5($pointJ1)
    {
        $this->pointJ2_cat5 = $pointJ1;
        return $this;
    }
    /**
     * Get pointJ2_cat5
     *
     * @return int
     */
    public function getPointJ2_cat5()
    {
        return $this->pointJ2_cat5;
    }
    //////////
    /////////////////////////////////////////////////////////
    /**
     * Set pointJ2
     *
     * @param integer $pointJ2
     *
     * @return Parties
     */
    public function setPointJ2($pointJ2)
    {
        $this->pointJ2 = $pointJ2;
        return $this;
    }
    /**
     * Get pointJ2
     *
     * @return int
     */
    public function getPointJ2()
    {
        return $this->pointJ2;
    }
    /**
     * Set tourde
     *
     * @param integer $tourde
     *
     * @return Parties
     */
    public function setTourde($tourde)
    {
        $this->tourde = $tourde;
        return $this;
    }
    /**
     * Get tourde
     *
     * @return integer
     */
    public function getTourde()
    {
        return $this->tourde;
    }
    /**
     * Set joueur1
     *
     * @param \AppBundle\Entity\User $joueur1
     *
     * @return Parties
     */
    public function setJoueur1(\AppBundle\Entity\User $joueur1 = null)
    {
        $this->joueur1 = $joueur1;
        return $this;
    }
    /**
     * Get joueur1
     *
     * @return \AppBundle\Entity\User
     */
    public function getJoueur1()
    {
        return $this->joueur1;
    }
    /**
     * Set joueur2
     *
     * @param \AppBundle\Entity\User $joueur2
     *
     * @return Parties
     */
    public function setJoueur2(\AppBundle\Entity\User $joueur2 = null)
    {
        $this->joueur2 = $joueur2;
        return $this;
    }
    /**
     * Get joueur2
     *
     * @return \AppBundle\Entity\User
     */
    public function getJoueur2()
    {
        return $this->joueur2;
    }
    public function __construct()
    {
        $this->setDebut(new \DateTime("now"));
        //$this->setFin('');
    }
    /**
     * Set situation
     *
     * @param \AppBundle\Entity\Situation $situation
     *
     * @return Parties
     */
    public function setSituation(\AppBundle\Entity\Situation $situation = null)
    {
        $this->situation = $situation;
        return $this;
    }
    /**
     * Get situation
     *
     * @return \AppBundle\Entity\Situation
     */
    public function getSituation()
    {
        return $this->situation;
    }
}