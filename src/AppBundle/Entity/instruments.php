<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * instruments
 *
 * @ORM\Table(name="instruments")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\instrumentsRepository")
 */
class instruments
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
     * @ORM\Column(name="instru_categorie", type="string", length=255)
     */
    private $instruCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="instru_type", type="string", length=255)
     */
    private $instruType;

    /**
     * @var string
     *
     * @ORM\Column(name="instru_valeur", type="string", length=255)
     */
    private $instruValeur;

    /**
     * @var string
     *
     * @ORM\Column(name="intru_image", type="string", length=255)
     */
    private $intruImage;


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
     * Set instruCategorie
     *
     * @param string $instruCategorie
     *
     * @return instruments
     */
    public function setInstruCategorie($instruCategorie)
    {
        $this->instruCategorie = $instruCategorie;

        return $this;
    }

    /**
     * Get instruCategorie
     *
     * @return string
     */
    public function getInstruCategorie()
    {
        return $this->instruCategorie;
    }

    /**
     * Set instruType
     *
     * @param string $instruType
     *
     * @return instruments
     */
    public function setInstruType($instruType)
    {
        $this->instruType = $instruType;

        return $this;
    }

    /**
     * Get instruType
     *
     * @return string
     */
    public function getInstruType()
    {
        return $this->instruType;
    }

    /**
     * Set instruValeur
     *
     * @param string $instruValeur
     *
     * @return instruments
     */
    public function setInstruValeur($instruValeur)
    {
        $this->instruValeur = $instruValeur;

        return $this;
    }

    /**
     * Get instruValeur
     *
     * @return string
     */
    public function getInstruValeur()
    {
        return $this->instruValeur;
    }

    /**
     * Set intruImage
     *
     * @param string $intruImage
     *
     * @return instruments
     */
    public function setIntruImage($intruImage)
    {
        $this->intruImage = $intruImage;

        return $this;
    }

    /**
     * Get intruImage
     *
     * @return string
     */
    public function getIntruImage()
    {
        return $this->intruImage;
    }
}

