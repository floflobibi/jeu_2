<?php
/**
 * Created by PhpStorm.
 * User: Florine
 * Date: 24/03/2017
 * Time: 08:48
 */
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Cartes
 *
 * @ORM\Table(name="cartes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CartesRepository")
 */
class Cartes
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
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categories")
     */
    private $categorie;
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100)
     */
    private $type;
    /**
     * @var int
     *
     * @ORM\Column(name="valeur", type="integer")
     */
    private $valeur;
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=100)
     */
    private $image;
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
     * Set type
     *
     * @param string $type
     *
     * @return Cartes
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * Set valeur
     *
     * @param integer $valeur
     *
     * @return Cartes
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
        return $this;
    }
    /**
     * Get valeur
     *
     * @return int
     */
    public function getValeur()
    {
        return $this->valeur;
    }
    /**
     * Set image
     *
     * @param string $image
     *
     * @return Cartes
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }
    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * Set categorie
     *
     * @param \AppBundle\Entity\Categories $categorie
     *
     * @return Cartes
     */
    public function setCategorie(\AppBundle\Entity\Categories $categorie = null)
    {
        $this->categorie = $categorie;
        return $this;
    }
    /**
     * Get categorie
     *
     * @return \AppBundle\Entity\Categories
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}