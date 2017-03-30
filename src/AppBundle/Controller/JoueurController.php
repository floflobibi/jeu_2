<?php
/**
 * Created by PhpStorm.
 * User: Florine
 * Date: 26/03/2017
 * Time: 15:49
 */
namespace AppBundle\Controller;
use AppBundle\Entity\User;
use AppBundle\Entity\Parties;
use AppBundle\Entity\Situation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * Class DefaultController
 * @package AppBundle\Controller
 * @Route("joueur")
 */
class JoueurController extends Controller
{
    /**
     * @Route("/", name="joueur_homepage")
     */
    public function indexAction()
    {
        $user = $this->getUser();
        return $this->render("joueur/index.html.twig", ['user' => $user]);
    }
    /**
     * @Route("/parties/", name="joueur_parties")
     */
    public function mesPartiesAction()
    {
        $user = $this->getUser();
        return $this->render("joueur/mesparties.html.twig", ['user' => $user]);
    }
    /**
     * @Route("/parties/add", name="joueur_parties_add")
     */
    public function addPartieAction()
    {
        $user = $this->getUser();
        // récupérer tous les joueurs existants
        $joueurs = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        return $this->render("joueur/addPartie.html.twig", ['user' => $user, 'joueurs' => $joueurs]);
    }
    /**
     * @param User $id
     * @Route("/inviter/{joueur}", name="creer_partie")
     */
    public function creerPartieAction(User $joueur)
    {
        $user = $this->getUser();
        $partie = new Parties();
        $partie->setJoueur1($user);
        $partie->setJoueur2($joueur);
        $em = $this->getDoctrine()->getManager();
        $em->persist($partie);
        $em->flush();
        $situation = new Situation();
        $situation->setPartie($partie);
        // récupérer les cartes
        $cartes = $this->getDoctrine()->getRepository('AppBundle:Cartes')->findAll();
        //on mélange les cartes
        shuffle($cartes);
        $t = array();
        for($i = 0; $i<8; $i++)
        {
            $t[] = $cartes[$i]->getId();
        }
        $situation->setMainJ1(json_encode($t));
        $t = array();
        for($i = 8; $i<16; $i++)
        {
            $t[] = $cartes[$i]->getId();
        }
        $situation->setMainJ2(json_encode($t));
        $t = array();
        for($i = 16; $i<count($cartes); $i++)
        {
            $t[] = $cartes[$i]->getId();
        }
        $situation->setPioche(json_encode($t));
        $em->persist($situation);
        $em->flush();
        return $this->render('joueur/partie.html.twig', ['partie' => $partie]);
    }

    /**
     * @param Parties $id
     * @Route("/afficher/{id}", name="afficher_partie")
     */
    public function afficherPartieAction(Parties $id)
    {
        $cartes = $this->getDoctrine()->getRepository('AppBundle:Cartes')->getAll();
        $user = $this->getUser();
        $situation = $id->getSituation();
        $plateau['mainJ1'] = json_decode($situation->getMainJ1());
        $plateau['mainJ2'] = json_decode($situation->getMainJ2());
        $plateau['pioche'] = json_decode($situation->getPioche());
        //$plateau['cartesPoseesJ1'] = json_decode($situation->getCartesPoseesJ1());
        //$plateau['cartesPoseesJ2'] = json_decode($situation->getCartesPoseesJ2());


        return $this->render(':joueur:afficherpartie.html.twig', ['cartes' => $cartes, 'partie' => $id, 'user' => $user, 'plateau' => $plateau]);

    }

}