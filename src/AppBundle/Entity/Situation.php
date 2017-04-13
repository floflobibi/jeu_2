<?php
/**
 * Created by PhpStorm.
 * User: Florine
 * Date: 24/03/2017
 * Time: 08:52
 */


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Situation
 *
 * @ORM\Table(name="situation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SituationRepository")
 */
class Situation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    ///////////////////////////
    /**
     * @var array
     *
     * @ORM\Column(name="defausse_cat1", type="array", nullable=true)
     */
    private $defausse_cat1;
    /**
     * @var array
     *
     * @ORM\Column(name="defausse_cat2", type="array", nullable=true)
     */
    private $defausse_cat2;
    /**
     * @var array
     *
     * @ORM\Column(name="defausse_cat3", type="array", nullable=true)
     */
    private $defausse_cat3;
    /**
     * @var array
     *
     * @ORM\Column(name="defausse_cat4", type="array", nullable=true)
     */
    private $defausse_cat4;
    /**
     * @var array
     *
     * @ORM\Column(name="defausse_cat5", type="array", nullable=true)
     */
    private $defausse_cat5;
    //////////////////////////////
    /**
     * @var array
     *
     * @ORM\Column(name="main_j1", type="json_array")
     */
    private $mainJ1;
    /**
     * @var array
     *
     * @ORM\Column(name="main_j2", type="json_array")
     */
    private $mainJ2;
    /**
     * @var array
     *
     * @ORM\Column(name="pioche", type="json_array")
     */
    private $pioche;
    /**
     * @var array
     *
     * @ORM\Column(name="cartes_posees_j1_cat1", type="json_array", nullable=true)
     */
    private $cartesPoseesJ1_cat1;
    /**
     * @var array
     *
     * @ORM\Column(name="cartes_posees_j1_cat2", type="json_array", nullable=true)
     */
    private $cartesPoseesJ1_cat2;
    /**
     * @var array
     *
     * @ORM\Column(name="cartes_posees_j1_cat3", type="json_array", nullable=true)
     */
    private $cartesPoseesJ1_cat3;
    /**
     * @var array
     *
     * @ORM\Column(name="cartes_posees_j1_cat4", type="json_array", nullable=true)
     */
    private $cartesPoseesJ1_cat4;
    /**
     * @var array
     *
     * @ORM\Column(name="cartes_posees_j1_cat5", type="json_array", nullable=true)
     */
    private $cartesPoseesJ1_cat5;


    ///

    /**
     * @var array
     *
     * @ORM\Column(name="cartes_posees_j2_cat1", type="json_array", nullable=true)
     */
    private $cartesPoseesJ2_cat1;
    /**
     * @var array
     *
     * @ORM\Column(name="cartes_posees_j2_cat2", type="json_array", nullable=true)
     */
    private $cartesPoseesJ2_cat2;
    /**
     * @var array
     *
     * @ORM\Column(name="cartes_posees_j2_cat3", type="json_array", nullable=true)
     */
    private $cartesPoseesJ2_cat3;
    /**
     * @var array
     *
     * @ORM\Column(name="cartes_posees_j2_cat4", type="json_array", nullable=true)
     */
    private $cartesPoseesJ2_cat4;
    /**
     * @var array
     *
     * @ORM\Column(name="cartes_posees_j2_cat5", type="json_array", nullable=true)
     */
    private $cartesPoseesJ2_cat5;

    ///


    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Parties", mappedBy="situation")
     */
    private $partie;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /////////////////////////////////////////////////////////////
    /**
     * Set defausse_cat1
     *
     * @param array $defausse_cat1
     *
     * @return Situation
     */
    public function setDefausse_cat1($defausse_cat1)
    {
        $this->defausse_cat1 = $defausse_cat1;
        return $this;
    }
    /**
     * Get defausse_cat1
     *
     * @return array
     */
    public function getDefausse_cat1()
    {
        return $this->defausse_cat1;
    }
    //////////
    /**
     * Set defausse_cat2
     *
     * @param array $defausse_cat2
     *
     * @return Situation
     */
    public function setDefausse_cat2($defausse_cat2)
    {
        $this->defausse_cat2 = $defausse_cat2;
        return $this;
    }
    /**
     * Get defausse_cat2
     *
     * @return array
     */
    public function getDefausse_cat2()
    {
        return $this->defausse_cat2;
    }
    /////////
    /**
     * Set defausse_cat3
     *
     * @param array $defausse_cat3
     *
     * @return Situation
     */
    public function setDefausse_cat3($defausse_cat3)
    {
        $this->defausse_cat3 = $defausse_cat3;
        return $this;
    }
    /**
     * Get defausse_cat3
     *
     * @return array
     */
    public function getDefausse_cat3()
    {
        return $this->defausse_cat3;
    }
    /////////
    /**
     * Set defausse_cat4
     *
     * @param array $defausse_cat4
     *
     * @return Situation
     */
    public function setDefausse_cat4($defausse_cat4)
    {
        $this->defausse_cat4 = $defausse_cat4;
        return $this;
    }
    /**
     * Get defausse_cat4
     *
     * @return array
     */
    public function getDefausse_cat4()
    {
        return $this->defausse_cat4;
    }
    /////////
    /**
     * Set defausse_cat5
     *
     * @param array $defausse_cat5
     *
     * @return Situation
     */
    public function setDefausse_cat5($defausse_cat5)
    {
        $this->defausse_cat5 = $defausse_cat5;
        return $this;
    }
    /**
     * Get defausse_cat5
     *
     * @return array
     */
    public function getDefausse_cat5()
    {
        return $this->defausse_cat5;
    }
    /////////

    ////////////////////////////////////////////////////////////////
    /**
     * Set mainJ1
     *
     * @param array $mainJ1
     *
     * @return Situation
     */
    public function setMainJ1($mainJ1)
    {
        $this->mainJ1 = $mainJ1;
        return $this;
    }
    /**
     * Get mainJ1
     *
     * @return array
     */
    public function getMainJ1()
    {
        return $this->mainJ1;
    }
    /**
     * Set mainJ2
     *
     * @param array $mainJ2
     *
     * @return Situation
     */
    public function setMainJ2($mainJ2)
    {
        $this->mainJ2 = $mainJ2;
        return $this;
    }
    /**
     * Get mainJ2
     *
     * @return array
     */
    public function getMainJ2()
    {
        return $this->mainJ2;
    }
    /**
     * Set pioche
     *
     * @param array $pioche
     *
     * @return Situation
     */
    public function setPioche($pioche)
    {
        $this->pioche = $pioche;
        return $this;
    }
    /**
     * Get pioche
     *
     * @return array
     */
    public function getPioche()
    {
        return $this->pioche;
    }
    /**
     * Set cartesPoseesJ1_cat1
     *
     * @param array $cartesPoseesJ1_cat1
     *
     * @return Situation
     */
    public function setCartesPoseesJ1_cat1($cartesPoseesJ1_cat1)
    {
        $this->cartesPoseesJ1_cat1 = $cartesPoseesJ1_cat1;
        return $this;
    }
    /**
     * Get cartesPoseesJ1_cat1
     *
     * @return array
     */
    public function getCartesPoseesJ1_cat1()
    {
        return $this->cartesPoseesJ1_cat1;
    }
    /**
     * Set cartesPoseesJ1_cat2
     *
     * @param array $cartesPoseesJ1_cat2
     *
     * @return Situation
     */
    public function setCartesPoseesJ1_cat2($cartesPoseesJ1_cat2)
    {
        $this->cartesPoseesJ1_cat2 = $cartesPoseesJ1_cat2;
        return $this;
    }
    /**
     * Get cartesPoseesJ1_cat2
     *
     * @return array
     */
    public function getCartesPoseesJ1_cat2()
    {
        return $this->cartesPoseesJ1_cat2;
    }
    /**
     * Set cartesPoseesJ1_cat3
     *
     * @param array $cartesPoseesJ1_cat3
     *
     * @return Situation
     */
    public function setCartesPoseesJ1_cat3($cartesPoseesJ1_cat3)
    {
        $this->cartesPoseesJ1_cat3 = $cartesPoseesJ1_cat3;
        return $this;
    }
    /**
     * Get cartesPoseesJ1_cat3
     *
     * @return array
     */
    public function getCartesPoseesJ1_cat3()
    {
        return $this->cartesPoseesJ1_cat3;
    }
    /**
     * Set cartesPoseesJ1_cat4
     *
     * @param array $cartesPoseesJ1_cat4
     *
     * @return Situation
     */
    public function setCartesPoseesJ1_cat4($cartesPoseesJ1_cat4)
    {
        $this->cartesPoseesJ1_cat4 = $cartesPoseesJ1_cat4;
        return $this;
    }
    /**
     * Get cartesPoseesJ1_cat4
     *
     * @return array
     */
    public function getCartesPoseesJ1_cat4()
    {
        return $this->cartesPoseesJ1_cat4;
    }
    /**
     * Set cartesPoseesJ1_cat5
     *
     * @param array $cartesPoseesJ1_cat5
     *
     * @return Situation
     */
    public function setCartesPoseesJ1_cat5($cartesPoseesJ1_cat5)
    {
        $this->cartesPoseesJ1_cat5 = $cartesPoseesJ1_cat5;
        return $this;
    }
    /**
     * Get cartesPoseesJ1_cat5
     *
     * @return array
     */
    public function getCartesPoseesJ1_cat5()
    {
        return $this->cartesPoseesJ1_cat5;
    }
//////////////////////////////////////////////////

    /**
     * Set cartesPoseesJ2_cat1
     *
     * @param array $cartesPoseesJ2_cat1
     *
     * @return Situation
     */
    public function setCartesPoseesJ2_cat1($cartesPoseesJ2_cat1)
    {
        $this->cartesPoseesJ2_cat1 = $cartesPoseesJ2_cat1;
        return $this;
    }
    /**
     * Get cartesPoseesJ2_cat1
     *
     * @return array
     */
    public function getCartesPoseesJ2_cat1()
    {
        return $this->cartesPoseesJ2_cat1;
    }
    /**
     * Set cartesPoseesJ2_cat2
     *
     * @param array $cartesPoseesJ2_cat2
     *
     * @return Situation
     */
    public function setCartesPoseesJ2_cat2($cartesPoseesJ2_cat2)
    {
        $this->cartesPoseesJ2_cat2 = $cartesPoseesJ2_cat2;
        return $this;
    }
    /**
     * Get cartesPoseesJ2_cat2
     *
     * @return array
     */
    public function getCartesPoseesJ2_cat2()
    {
        return $this->cartesPoseesJ2_cat2;
    }
    /**
     * Set cartesPoseesJ2_cat3
     *
     * @param array $cartesPoseesJ2_cat3
     *
     * @return Situation
     */
    public function setCartesPoseesJ2_cat3($cartesPoseesJ2_cat3)
    {
        $this->cartesPoseesJ2_cat3 = $cartesPoseesJ2_cat3;
        return $this;
    }
    /**
     * Get cartesPoseesJ2_cat3
     *
     * @return array
     */
    public function getCartesPoseesJ2_cat3()
    {
        return $this->cartesPoseesJ2_cat3;
    }
    /**
     * Set cartesPoseesJ2_cat4
     *
     * @param array $cartesPoseesJ2_cat4
     *
     * @return Situation
     */
    public function setCartesPoseesJ2_cat4($cartesPoseesJ2_cat4)
    {
        $this->cartesPoseesJ2_cat4 = $cartesPoseesJ2_cat4;
        return $this;
    }
    /**
     * Get cartesPoseesJ2_cat4
     *
     * @return array
     */
    public function getCartesPoseesJ2_cat4()
    {
        return $this->cartesPoseesJ2_cat4;
    }
    /**
     * Set cartesPoseesJ2_cat5
     *
     * @param array $cartesPoseesJ2_cat5
     *
     * @return Situation
     */
    public function setCartesPoseesJ2_cat5($cartesPoseesJ2_cat5)
    {
        $this->cartesPoseesJ2_cat5 = $cartesPoseesJ2_cat5;
        return $this;
    }
    /**
     * Get cartesPoseesJ2_cat5
     *
     * @return array
     */
    public function getCartesPoseesJ2_cat5()
    {
        return $this->cartesPoseesJ2_cat5;
    }

//////////////////////////////////////////////////
    /**
     * Set partie
     *
     * @param \AppBundle\Entity\Parties $partie
     *
     * @return Situation
     */
    public function setPartie(\AppBundle\Entity\Parties $partie = null)
    {
        $this->partie = $partie;
        return $this;
    }
    /**
     * Get partie
     *
     * @return \AppBundle\Entity\Parties
     */
    public function getPartie()
    {
        return $this->partie;
    }
}