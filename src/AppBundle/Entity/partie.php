<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * partie
 *
 * @ORM\Table(name="partie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\partieRepository")
 */
class partie
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
     * @var string
     *
     * @ORM\Column(name="partie_joueur_un", type="string", length=255)
     */
    private $partieJoueurUn;

    /**
     * @var string
     *
     * @ORM\Column(name="partie_joueur_deux", type="string", length=255)
     */
    private $partieJoueurDeux;

    /**
     * @var string
     *
     * @ORM\Column(name="partie_points_joueur_un", type="string", length=255)
     */
    private $partiePointsJoueurUn;

    /**
     * @var string
     *
     * @ORM\Column(name="partie_points_joueur_deux", type="string", length=255)
     */
    private $partiePointsJoueurDeux;

    /**
     * @var string
     *
     * @ORM\Column(name="partie_debut", type="string", length=255)
     */
    private $partieDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="partie_fin", type="string", length=255)
     */
    private $partieFin;


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
     * Set partieJoueurUn
     *
     * @param string $partieJoueurUn
     *
     * @return partie
     */
    public function setPartieJoueurUn($partieJoueurUn)
    {
        $this->partieJoueurUn = $partieJoueurUn;

        return $this;
    }

    /**
     * Get partieJoueurUn
     *
     * @return string
     */
    public function getPartieJoueurUn()
    {
        return $this->partieJoueurUn;
    }

    /**
     * Set partieJoueurDeux
     *
     * @param string $partieJoueurDeux
     *
     * @return partie
     */
    public function setPartieJoueurDeux($partieJoueurDeux)
    {
        $this->partieJoueurDeux = $partieJoueurDeux;

        return $this;
    }

    /**
     * Get partieJoueurDeux
     *
     * @return string
     */
    public function getPartieJoueurDeux()
    {
        return $this->partieJoueurDeux;
    }

    /**
     * Set partiePointsJoueurUn
     *
     * @param string $partiePointsJoueurUn
     *
     * @return partie
     */
    public function setPartiePointsJoueurUn($partiePointsJoueurUn)
    {
        $this->partiePointsJoueurUn = $partiePointsJoueurUn;

        return $this;
    }

    /**
     * Get partiePointsJoueurUn
     *
     * @return string
     */
    public function getPartiePointsJoueurUn()
    {
        return $this->partiePointsJoueurUn;
    }

    /**
     * Set partiePointsJoueurDeux
     *
     * @param string $partiePointsJoueurDeux
     *
     * @return partie
     */
    public function setPartiePointsJoueurDeux($partiePointsJoueurDeux)
    {
        $this->partiePointsJoueurDeux = $partiePointsJoueurDeux;

        return $this;
    }

    /**
     * Get partiePointsJoueurDeux
     *
     * @return string
     */
    public function getPartiePointsJoueurDeux()
    {
        return $this->partiePointsJoueurDeux;
    }

    /**
     * Set partieDebut
     *
     * @param string $partieDebut
     *
     * @return partie
     */
    public function setPartieDebut($partieDebut)
    {
        $this->partieDebut = $partieDebut;

        return $this;
    }

    /**
     * Get partieDebut
     *
     * @return string
     */
    public function getPartieDebut()
    {
        return $this->partieDebut;
    }

    /**
     * Set partieFin
     *
     * @param string $partieFin
     *
     * @return partie
     */
    public function setPartieFin($partieFin)
    {
        $this->partieFin = $partieFin;

        return $this;
    }

    /**
     * Get partieFin
     *
     * @return string
     */
    public function getPartieFin()
    {
        return $this->partieFin;
    }
}

