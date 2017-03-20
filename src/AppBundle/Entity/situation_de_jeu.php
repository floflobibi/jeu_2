<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * situation_de_jeu
 *
 * @ORM\Table(name="situation_de_jeu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\situation_de_jeuRepository")
 */
class situation_de_jeu
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
     * @ORM\Column(name="site_defausse", type="string", length=255)
     */
    private $siteDefausse;

    /**
     * @var string
     *
     * @ORM\Column(name="sit_main_j_1", type="string", length=255)
     */
    private $sitMainJ1;

    /**
     * @var string
     *
     * @ORM\Column(name="sit_main_j_2", type="string", length=255)
     */
    private $sitMainJ2;

    /**
     * @var string
     *
     * @ORM\Column(name="site_pioche", type="string", length=255)
     */
    private $sitePioche;

    /**
     * @var string
     *
     * @ORM\Column(name="sit_cartes_posees_j_1", type="string", length=255)
     */
    private $sitCartesPoseesJ1;

    /**
     * @var string
     *
     * @ORM\Column(name="sit_cartes_posees_j_2", type="string", length=255)
     */
    private $sitCartesPoseesJ2;

    /**
     * @var string
     *
     * @ORM\Column(name="sit_ordre_cartes", type="string", length=255)
     */
    private $sitOrdreCartes;

    /**
     * @var string
     *
     * @ORM\Column(name="site_tour_de", type="string", length=255)
     */
    private $siteTourDe;

    /**
     * @var int
     *
     * @ORM\Column(name="_instru_id", type="integer")
     */
    private $instruId;

    /**
     * @var int
     *
     * @ORM\Column(name="_partie_id", type="integer")
     */
    private $partieId;


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
     * Set siteDefausse
     *
     * @param string $siteDefausse
     *
     * @return situation_de_jeu
     */
    public function setSiteDefausse($siteDefausse)
    {
        $this->siteDefausse = $siteDefausse;

        return $this;
    }

    /**
     * Get siteDefausse
     *
     * @return string
     */
    public function getSiteDefausse()
    {
        return $this->siteDefausse;
    }

    /**
     * Set sitMainJ1
     *
     * @param string $sitMainJ1
     *
     * @return situation_de_jeu
     */
    public function setSitMainJ1($sitMainJ1)
    {
        $this->sitMainJ1 = $sitMainJ1;

        return $this;
    }

    /**
     * Get sitMainJ1
     *
     * @return string
     */
    public function getSitMainJ1()
    {
        return $this->sitMainJ1;
    }

    /**
     * Set sitMainJ2
     *
     * @param string $sitMainJ2
     *
     * @return situation_de_jeu
     */
    public function setSitMainJ2($sitMainJ2)
    {
        $this->sitMainJ2 = $sitMainJ2;

        return $this;
    }

    /**
     * Get sitMainJ2
     *
     * @return string
     */
    public function getSitMainJ2()
    {
        return $this->sitMainJ2;
    }

    /**
     * Set sitePioche
     *
     * @param string $sitePioche
     *
     * @return situation_de_jeu
     */
    public function setSitePioche($sitePioche)
    {
        $this->sitePioche = $sitePioche;

        return $this;
    }

    /**
     * Get sitePioche
     *
     * @return string
     */
    public function getSitePioche()
    {
        return $this->sitePioche;
    }

    /**
     * Set sitCartesPoseesJ1
     *
     * @param string $sitCartesPoseesJ1
     *
     * @return situation_de_jeu
     */
    public function setSitCartesPoseesJ1($sitCartesPoseesJ1)
    {
        $this->sitCartesPoseesJ1 = $sitCartesPoseesJ1;

        return $this;
    }

    /**
     * Get sitCartesPoseesJ1
     *
     * @return string
     */
    public function getSitCartesPoseesJ1()
    {
        return $this->sitCartesPoseesJ1;
    }

    /**
     * Set sitCartesPoseesJ2
     *
     * @param string $sitCartesPoseesJ2
     *
     * @return situation_de_jeu
     */
    public function setSitCartesPoseesJ2($sitCartesPoseesJ2)
    {
        $this->sitCartesPoseesJ2 = $sitCartesPoseesJ2;

        return $this;
    }

    /**
     * Get sitCartesPoseesJ2
     *
     * @return string
     */
    public function getSitCartesPoseesJ2()
    {
        return $this->sitCartesPoseesJ2;
    }

    /**
     * Set sitOrdreCartes
     *
     * @param string $sitOrdreCartes
     *
     * @return situation_de_jeu
     */
    public function setSitOrdreCartes($sitOrdreCartes)
    {
        $this->sitOrdreCartes = $sitOrdreCartes;

        return $this;
    }

    /**
     * Get sitOrdreCartes
     *
     * @return string
     */
    public function getSitOrdreCartes()
    {
        return $this->sitOrdreCartes;
    }

    /**
     * Set siteTourDe
     *
     * @param string $siteTourDe
     *
     * @return situation_de_jeu
     */
    public function setSiteTourDe($siteTourDe)
    {
        $this->siteTourDe = $siteTourDe;

        return $this;
    }

    /**
     * Get siteTourDe
     *
     * @return string
     */
    public function getSiteTourDe()
    {
        return $this->siteTourDe;
    }

    /**
     * Set instruId
     *
     * @param integer $instruId
     *
     * @return situation_de_jeu
     */
    public function setInstruId($instruId)
    {
        $this->instruId = $instruId;

        return $this;
    }

    /**
     * Get instruId
     *
     * @return int
     */
    public function getInstruId()
    {
        return $this->instruId;
    }

    /**
     * Set partieId
     *
     * @param integer $partieId
     *
     * @return situation_de_jeu
     */
    public function setPartieId($partieId)
    {
        $this->partieId = $partieId;

        return $this;
    }

    /**
     * Get partieId
     *
     * @return int
     */
    public function getPartieId()
    {
        return $this->partieId;
    }
}

