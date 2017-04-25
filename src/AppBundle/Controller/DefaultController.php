<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:hello.html.twig');
    }
    /**
     * @Route("/classement", name="classement")
     */
    public function classementAction()
    {
        $joueurs = $this->getDoctrine()->getRepository('AppBundle:User')->findBy(array(),array('partiesGagnees'=>'desc'));

        return $this->render('AppBundle:Default:classement.html.twig', ['joueurs'=>$joueurs]);
    }
    /**
     * @Route("/playlist", name="playlist")
     */
    public function playlistAction()
    {
        return $this->render('AppBundle:Default:playlist.html.twig');
    }
    /**
     * @Route("/plateau", name="plateau")
     */
    public function jeuAction()
    {
        return $this->render('AppBundle:Default:jeu.html.twig');
    }
}
