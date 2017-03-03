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
     * @Route("/page", name="page")
     */
    public function pageAction(){
        $var1="Floflo bibi";
        $array=array("jour" =>"Vendredi", "mois" =>"Février");
        return $this->render('AppBundle:Default:page.html.twig',array('maVariable'=>$var1,'array'=>$array));
    }
}
