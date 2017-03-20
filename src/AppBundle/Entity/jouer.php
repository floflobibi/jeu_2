<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * jouer
 *
 * @ORM\Table(name="jouer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\jouerRepository")
 */
class jouer
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
     * @var int
     *
     * @ORM\Column(name="joueur_id", type="integer")
     */
    private $joueurId;

    /**
     * @var int
     *
     * @ORM\Column(name="partie_id", type="integer")
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
     * Set joueurId
     *
     * @param integer $joueurId
     *
     * @return jouer
     */
    public function setJoueurId($joueurId)
    {
        $this->joueurId = $joueurId;

        return $this;
    }

    /**
     * Get joueurId
     *
     * @return int
     */
    public function getJoueurId()
    {
        return $this->joueurId;
    }

    /**
     * Set partieId
     *
     * @param integer $partieId
     *
     * @return jouer
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

