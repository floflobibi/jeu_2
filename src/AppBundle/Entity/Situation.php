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
    /**
     * @var array
     *
     * @ORM\Column(name="defausse", type="array", nullable=true)
     */
    private $defausse;
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
     * @ORM\Column(name="cartes_posees_j1", type="json_array", nullable=true)
     */
    private $cartesPoseesJ1;
    /**
     * @var array
     *
     * @ORM\Column(name="cartes_posees_j2", type="json_array", nullable=true)
     */
    private $cartesPoseesJ2;
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
    /**
     * Set defausse
     *
     * @param array $defausse
     *
     * @return Situation
     */
    public function setDefausse($defausse)
    {
        $this->defausse = $defausse;
        return $this;
    }
    /**
     * Get defausse
     *
     * @return array
     */
    public function getDefausse()
    {
        return $this->defausse;
    }
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
     * Set cartesPoseesJ1
     *
     * @param array $cartesPoseesJ1
     *
     * @return Situation
     */
    public function setCartesPoseesJ1($cartesPoseesJ1)
    {
        $this->cartesPoseesJ1 = $cartesPoseesJ1;
        return $this;
    }
    /**
     * Get cartesPoseesJ1
     *
     * @return array
     */
    public function getCartesPoseesJ1()
    {
        return $this->cartesPoseesJ1;
    }
    /**
     * Set cartesPoseesJ2
     *
     * @param array $cartesPoseesJ2
     *
     * @return Situation
     */
    public function setCartesPoseesJ2($cartesPoseesJ2)
    {
        $this->cartesPoseesJ2 = $cartesPoseesJ2;
        return $this;
    }
    /**
     * Get cartesPoseesJ2
     *
     * @return array
     */
    public function getCartesPoseesJ2()
    {
        return $this->cartesPoseesJ2;
    }
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