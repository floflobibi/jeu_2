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
        return $this->render("joueur/addpartie.html.twig", ['user' => $user, 'joueurs' => $joueurs]);
    }
    /**
     * @param User $id
     * @Route("/inviter/{joueur}", name="creer_partie")
     */
    public function creerPartieAction(User $joueur)
    {
        $user = $this->getUser();
        $situation = new Situation();
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


        $em = $this->getDoctrine()->getManager();

        $em->persist($situation);
        $em->flush();
        //On etablie la nouvelle partie
        $partie = new Parties();
        $partie->setJoueur1($user);
        $partie->setJoueur2($joueur);
        $partie->setSituation($situation);
        $partie->setTourde($user->getId());

        $em->persist($partie);
        $em->flush();
        return $this->redirectToRoute('afficher_partie', ['id' => $partie->getId()]);
        //return $this->render('joueur/partie.html.twig', ['partie' => $partie]);
    }
    /**
     * @param Parties $id
     * @Route("/afficher/{id}", name="afficher_partie")
     */
    public function afficherPartieAction(Parties $id)
    {
        $cartes = $this->getDoctrine()->getRepository('AppBundle:Cartes')->getAll();
        $user = $this->getUser();
        //Récup partie
        $situation = $id->getSituation();
        //Décode le json de la bdd pour afficher
        $plateau['mainJ1'] = json_decode($situation->getMainJ1());
        $plateau['mainJ2'] = json_decode($situation->getMainJ2());
        $plateau['pioche'] = json_decode($situation->getPioche());
        if (!empty($situation->getCartesPoseesJ1_cat1())){
            $plateau['poseesj1_cat1'] = json_decode($situation->getCartesPoseesJ1_cat1());
        }else {
            $plateau['poseesj1_cat1'] = $situation->getCartesPoseesJ1_cat1();
            $plateau['poseesj1_cat1'] = array();
        }
        if (!empty($situation->getCartesPoseesJ1_cat2())){
            $plateau['poseesj1_cat2'] = json_decode($situation->getCartesPoseesJ1_cat2());
        }else {
            $plateau['poseesj1_cat2'] = $situation->getCartesPoseesJ1_cat2();
            $plateau['poseesj1_cat2'] = array();
        }
        if (!empty($situation->getCartesPoseesJ1_cat3())){
            $plateau['poseesj1_cat3'] = json_decode($situation->getCartesPoseesJ1_cat3());
        }else {
            $plateau['poseesj1_cat3'] = $situation->getCartesPoseesJ1_cat3();
            $plateau['poseesj1_cat3'] = array();
        }
        if (!empty($situation->getCartesPoseesJ1_cat4())){
            $plateau['poseesj1_cat4'] = json_decode($situation->getCartesPoseesJ1_cat4());
        }else {
            $plateau['poseesj1_cat4'] = $situation->getCartesPoseesJ1_cat4();
            $plateau['poseesj1_cat4'] = array();
        }
        if (!empty($situation->getCartesPoseesJ1_cat5())){
            $plateau['poseesj1_cat5'] = json_decode($situation->getCartesPoseesJ1_cat5());
        }else {
            $plateau['poseesj1_cat5'] = $situation->getCartesPoseesJ1_cat5();
            $plateau['poseesj1_cat5'] = array();
        }
/////////////////////////////////////////////////////////////////
        if (!empty($situation->getCartesPoseesJ2_cat1())){
            $plateau['poseesj2_cat1'] = json_decode($situation->getCartesPoseesJ2_cat1());
        }else {
            $plateau['poseesj2_cat1'] = $situation->getCartesPoseesJ2_cat1();
            $plateau['poseesj2_cat1'] = array();
        }
        if (!empty($situation->getCartesPoseesJ2_cat2())){
            $plateau['poseesj2_cat2'] = json_decode($situation->getCartesPoseesJ2_cat2());
        }else {
            $plateau['poseesj2_cat2'] = $situation->getCartesPoseesJ2_cat2();
            $plateau['poseesj2_cat2'] = array();
        }
        if (!empty($situation->getCartesPoseesJ2_cat3())){
            $plateau['poseesj2_cat3'] = json_decode($situation->getCartesPoseesJ2_cat3());
        }else {
            $plateau['poseesj2_cat3'] = $situation->getCartesPoseesJ2_cat3();
            $plateau['poseesj2_cat3'] = array();
        }
        if (!empty($situation->getCartesPoseesJ2_cat4())){
            $plateau['poseesj2_cat4'] = json_decode($situation->getCartesPoseesJ2_cat4());
        }else {
            $plateau['poseesj2_cat4'] = $situation->getCartesPoseesJ2_cat4();
            $plateau['poseesj2_cat4'] = array();
        }
        if (!empty($situation->getCartesPoseesJ2_cat5())){
            $plateau['poseesj2_cat5'] = json_decode($situation->getCartesPoseesJ2_cat5());
        }else {
            $plateau['poseesj2_cat5'] = $situation->getCartesPoseesJ2_cat5();
            $plateau['poseesj2_cat5'] = array();
        }
///////////////////////////////////////////////////////////////////
        $plateau['defausse_cat1'] = $situation->getDefausse_cat1();
        $plateau['defausse_cat2'] = $situation->getDefausse_cat2();
        $plateau['defausse_cat3'] = $situation->getDefausse_cat3();
        $plateau['defausse_cat4'] = $situation->getDefausse_cat4();
        $plateau['defausse_cat5'] = $situation->getDefausse_cat5();
///////////////////////////////////////////////////////////////////
        $plateau['pointj1'] = $id->getPointJ1();
        $plateau['pointj1_cat1'] = $id->getPointJ1_cat1();
        $plateau['pointj1_cat2'] = $id->getPointJ1_cat2();
        $plateau['pointj1_cat3'] = $id->getPointJ1_cat3();
        $plateau['pointj1_cat4'] = $id->getPointJ1_cat4();
        $plateau['pointj1_cat5'] = $id->getPointJ1_cat5();
///////////////////////////////////////////////////////////////////
        $plateau['pointj2'] = $id->getPointJ2();
        $plateau['pointj2_cat1'] = $id->getPointJ2_cat1();
        $plateau['pointj2_cat2'] = $id->getPointJ2_cat2();
        $plateau['pointj2_cat3'] = $id->getPointJ2_cat3();
        $plateau['pointj2_cat4'] = $id->getPointJ2_cat4();
        $plateau['pointj2_cat5'] = $id->getPointJ2_cat5();
///////////////////////////////////////////////////////////////////
        $tour = $id->getTourde();

        //Compter les cartes du joueur 1
        $nbcartesj1= count($plateau['mainJ1']);
        //Compter les cartes du joueur 2
        $nbcartesj2= count($plateau['mainJ2']);

        //Compter les cartes de la pioche
        $nbcartespioche= count($plateau['pioche']);

        return $this->render(':joueur:afficherpartie.html.twig', ['nbcartesj1' => $nbcartesj1, 'nbcartesj2' => $nbcartesj2, 'nbcartespioche' => $nbcartespioche,'cartes' => $cartes, 'partie' => $id, 'user' => $user, 'plateau' => $plateau, 'tour' => $tour]);

    }
    /**
     * @param Parties $id
     * @Route("/piocher/{id}", name="piocher_partie")
     */
    public function piocherAction(Parties $id)
    {
        $cartes = $this->getDoctrine()->getRepository('AppBundle:Cartes')->getAll();
        $user = $this->getUser();

        $situation = $id->getSituation();
        $plateau['mainJ1'] = json_decode($situation->getMainJ1());
        $plateau['mainJ2'] = json_decode($situation->getMainJ2());
        $plateau['pioche'] = json_decode($situation->getPioche());
        $pioche=$plateau['pioche'];
        $tour = $id->getTourde();
        $element = array_pop($pioche);
        $nouvellepioche = array_diff($pioche,[$element]);

        // Id joueur actif
        $useractif=$user->getId();

        //Id joueur 1
        $joueur1=$id->getJoueur1();
        $idjoueur1=$joueur1->getId();

        //Id joueur 2
        $joueur2=$id->getJoueur2();
        $idjoueur2=$joueur2->getId();

        if ($tour==$useractif){
            if ($useractif==$idjoueur1){
                $plateau['mainJ1'] = json_decode($situation->getMainJ1());
                $mainj1=$plateau['mainJ1'];
                $mainj1[]=$element;
                $situation->setMainJ1($mainj1);
                $em = $this->getDoctrine()->getManager();
                $situation->setMainJ1(json_encode($mainj1));
                $situation->setPioche(json_encode($nouvellepioche));
                $em->persist($situation);
                $em->flush();
                //Set le tour
                $em = $this->getDoctrine()->getManager();
                $nouveautour = $idjoueur2;
                $id->setTourde($nouveautour);
                $em->persist($id);
                $em->flush();
            }

            if($useractif==$idjoueur2){
                $plateau['mainJ2'] = json_decode($situation->getMainJ2());
                $mainj2=$plateau['mainJ2'];
                $mainj2[]=$element;
                $situation->setMainJ2($mainj2);
                $em = $this->getDoctrine()->getManager();
                $situation->setMainJ2(json_encode($mainj2));
                $situation->setPioche(json_encode($nouvellepioche));
                $em->persist($situation);
                $em->flush();
                //Set le tour
                $em = $this->getDoctrine()->getManager();
                $nouveautour = $idjoueur1;
                $id->setTourde($nouveautour);
                $em->persist($id);
                $em->flush();
            }
        }
        $partie=$situation->getId();
        $idd=$id->getId();

        //return $this->render(':joueur:piocher.html.twig', ['useridj1' => $idjoueur1,'useridj2' => $idjoueur2 ,'idd' => $idd,'cartes' => $cartes, 'partie' => $id, 'user' => $user, 'plateau' => $plateau, 'tour' => $tour, 'pioche' => $pioche, 'element' => $element, 'nouvellepioche' => $nouvellepioche, 'plateau' => $plateau, 'situation' => $situation, 'parte' =>'$partie']);
        return $this->redirectToRoute('afficher_partie', ['id' => $id->getId()]);
    }
    /**
     * @param Parties $id
     * @Route("/defausser/{id}", name="defausser_partie")
     */
    public function defausserAction(Request $request, Parties $id)
    {
        $cartes = $this->getDoctrine()->getRepository('AppBundle:Cartes')->getAll();
        $user = $this->getUser();

        $situation = $id->getSituation();
        $plateau['mainJ1'] = json_decode($situation->getMainJ1());
        $plateau['mainJ2'] = json_decode($situation->getMainJ2());

        if (!empty($situation->getDefausse_cat1())){
            $defausse1 = $plateau['defausse_cat1'] = $situation->getDefausse_cat1();
        }else {
            $defausse1 = $plateau['defausse_cat1'] = $situation->getDefausse_cat1();
            $defausse1 = array();
        }
        if (!empty($situation->getDefausse_cat2())){
            $defausse2 = $plateau['defausse_cat2'] = $situation->getDefausse_cat2();
        }else {
            $defausse2 = $plateau['defausse_cat2'] = $situation->getDefausse_cat2();
            $defausse2 = array();
        }
        if (!empty($situation->getDefausse_cat3())){
            $defausse3 = $plateau['defausse_cat3'] = $situation->getDefausse_cat3();
        }else {
            $defausse3 = $plateau['defausse_cat3'] = $situation->getDefausse_cat3();
            $defausse3 = array();
        }
        if (!empty($situation->getDefausse_cat4())){
            $defausse4 = $plateau['defausse_cat4'] = $situation->getDefausse_cat4();
        }else {
            $defausse4 = $plateau['defausse_cat4'] = $situation->getDefausse_cat4();
            $defausse4 = array();
        }
        if (!empty($situation->getDefausse_cat5())){
            $defausse5 = $plateau['defausse_cat5'] = $situation->getDefausse_cat5();
        }else {
            $defausse5 = $plateau['defausse_cat5'] = $situation->getDefausse_cat5();
            $defausse5 = array();
        }

        $tour = $id->getTourde();


        //Récupérer la carte sélectionnée
        $defausse_selectionnee = $request->get('defausse')*1;
        var_dump($defausse_selectionnee);

        //Si defausse1 selectionnée
        if ($defausse_selectionnee == 1){
           $element = array_pop($defausse1);
           $nouvelledefausse = array_diff($defausse1,[$element]);
        }

        //Si defausse2 selectionnée
        if ($defausse_selectionnee == 2){
            $element = array_pop($defausse2);
            $nouvelledefausse = array_diff($defausse2,[$element]);
        }
        //Si defausse3 selectionnée
        if ($defausse_selectionnee == 3){
            $element = array_pop($defausse3);
            $nouvelledefausse = array_diff($defausse3,[$element]);
        }
        //Si defausse4 selectionnée
        if ($defausse_selectionnee == 4){
            $element = array_pop($defausse4);
            $nouvelledefausse = array_diff($defausse4,[$element]);
        }
        //Si defausse5 selectionnée
        if ($defausse_selectionnee == 5){
            $element = array_pop($defausse5);
            $nouvelledefausse = array_diff($defausse5,[$element]);
        }


        // Id joueur actif
        $useractif=$user->getId();

        //Id joueur 1
        $joueur1=$id->getJoueur1();
        $idjoueur1=$joueur1->getId();

        //Id joueur 2
        $joueur2=$id->getJoueur2();
        $idjoueur2=$joueur2->getId();

        if ($tour==$useractif){
            if ($useractif==$idjoueur1){

                $mainj1=$plateau['mainJ1'];
                $mainj1[]=$element;
                $situation->setMainJ1($mainj1);
                $em = $this->getDoctrine()->getManager();
                $situation->setMainJ1(json_encode($mainj1));

                //Si defausse1 selectionné
                if ($defausse_selectionnee == 1){
                    $situation->setDefausse_cat1($nouvelledefausse);
                }
                //Si defausse2 selectionné
                if ($defausse_selectionnee == 2){
                    $situation->setDefausse_cat2($nouvelledefausse);
                }
                //Si defausse3 selectionné
                if ($defausse_selectionnee == 3){
                    $situation->setDefausse_cat3($nouvelledefausse);
                }
                //Si defausse4 selectionné
                if ($defausse_selectionnee == 4){
                    $situation->setDefausse_cat4($nouvelledefausse);
                }
                //Si defausse5 selectionné
                if ($defausse_selectionnee == 5){
                    $situation->setDefausse_cat5($nouvelledefausse);
                }

                $em->persist($situation);
                $em->flush();

                //Set le tour
                $em = $this->getDoctrine()->getManager();
                $nouveautour = $idjoueur2;
                $id->setTourde($nouveautour);
                $em->persist($id);
                $em->flush();
            }
            if ($useractif==$idjoueur2){

                $mainj2=$plateau['mainJ2'];
                $mainj2[]=$element;
                $situation->setMainJ2($mainj2);
                $em = $this->getDoctrine()->getManager();
                $situation->setMainJ2(json_encode($mainj2));

                //Si defausse1 selectionné
                if ($defausse_selectionnee == 1){
                    $situation->setDefausse_cat1($nouvelledefausse);
                }
                //Si defausse2 selectionné
                if ($defausse_selectionnee == 2){
                    $situation->setDefausse_cat2($nouvelledefausse);
                }
                //Si defausse3 selectionné
                if ($defausse_selectionnee == 3){
                    $situation->setDefausse_cat3($nouvelledefausse);
                }
                //Si defausse4 selectionné
                if ($defausse_selectionnee == 4){
                    $situation->setDefausse_cat4($nouvelledefausse);
                }
                //Si defausse5 selectionné
                if ($defausse_selectionnee == 5){
                    $situation->setDefausse_cat5($nouvelledefausse);
                }

                $em->persist($situation);
                $em->flush();

                //Set le tour
                $em = $this->getDoctrine()->getManager();
                $nouveautour = $idjoueur1;
                $id->setTourde($nouveautour);
                $em->persist($id);
                $em->flush();
            }
        }
        $partie=$situation->getId();
        $idd=$id->getId();

        //return $this->render(':joueur:defausser.html.twig', ['useridj1' => $idjoueur1,'useridj2' => $idjoueur2 ,'idd' => $idd,'cartes' => $cartes, 'partie' => $id, 'user' => $user, 'plateau' => $plateau, 'tour' => $tour, 'element' => $element, 'plateau' => $plateau, 'situation' => $situation, 'parte' =>'$partie']);
        return $this->redirectToRoute('afficher_partie', ['id' => $id->getId()]);
    }

    /**
     * @param Parties $id
     * @Route("/poser/{id}", name="poser_partie")
     */
    public function poserAction(Request $request, Parties $id)
    {
        $cartes = $this->getDoctrine()->getRepository('AppBundle:Cartes')->getAll();
        $user = $this->getUser();

        //Récupérer les données de base
        $situation = $id->getSituation();
        $plateau['mainJ1'] = json_decode($situation->getMainJ1());
        $plateau['mainJ2'] = json_decode($situation->getMainJ2());
        if (!empty($situation->getCartesPoseesJ1_cat1())){
            $plateau['poseesj1_cat1'] = json_decode($situation->getCartesPoseesJ1_cat1());
        }else {
            $plateau['poseesj1_cat1'] = $situation->getCartesPoseesJ1_cat1();
            $plateau['poseesj1_cat1'] = array();
        }
        if (!empty($situation->getCartesPoseesJ1_cat2())){
            $plateau['poseesj1_cat2'] = json_decode($situation->getCartesPoseesJ1_cat2());
        }else {
            $plateau['poseesj1_cat2'] = $situation->getCartesPoseesJ1_cat2();
            $plateau['poseesj1_cat2'] = array();
        }
        if (!empty($situation->getCartesPoseesJ1_cat3())){
            $plateau['poseesj1_cat3'] = json_decode($situation->getCartesPoseesJ1_cat3());
        }else {
            $plateau['poseesj1_cat3'] = $situation->getCartesPoseesJ1_cat3();
            $plateau['poseesj1_cat3'] = array();
        }
        if (!empty($situation->getCartesPoseesJ1_cat4())){
            $plateau['poseesj1_cat4'] = json_decode($situation->getCartesPoseesJ1_cat4());
        }else {
            $plateau['poseesj1_cat4'] = $situation->getCartesPoseesJ1_cat4();
            $plateau['poseesj1_cat4'] = array();
        }
        if (!empty($situation->getCartesPoseesJ1_cat2())){
            $plateau['poseesj1_cat5'] = json_decode($situation->getCartesPoseesJ1_cat5());
        }else {
            $plateau['poseesj1_cat5'] = $situation->getCartesPoseesJ1_cat5();
            $plateau['poseesj1_cat5'] = array();
        }
        if (!empty($situation->getCartesPoseesJ2_cat1())){
            $plateau['poseesj2_cat1'] = json_decode($situation->getCartesPoseesJ2_cat1());
        }else {
            $plateau['poseesj2_cat1'] = $situation->getCartesPoseesJ2_cat1();
            $plateau['poseesj2_cat1'] = array();
        }
        if (!empty($situation->getCartesPoseesJ2_cat2())){
            $plateau['poseesj2_cat2'] = json_decode($situation->getCartesPoseesJ2_cat2());
        }else {
            $plateau['poseesj2_cat2'] = $situation->getCartesPoseesJ2_cat2();
            $plateau['poseesj2_cat2'] = array();
        }
        if (!empty($situation->getCartesPoseesJ2_cat3())){
            $plateau['poseesj2_cat3'] = json_decode($situation->getCartesPoseesJ2_cat3());
        }else {
            $plateau['poseesj2_cat3'] = $situation->getCartesPoseesJ2_cat3();
            $plateau['poseesj2_cat3'] = array();
        }
        if (!empty($situation->getCartesPoseesJ2_cat4())){
            $plateau['poseesj2_cat4'] = json_decode($situation->getCartesPoseesJ2_cat4());
        }else {
            $plateau['poseesj2_cat4'] = $situation->getCartesPoseesJ2_cat4();
            $plateau['poseesj2_cat4'] = array();
        }
        if (!empty($situation->getCartesPoseesJ2_cat2())){
            $plateau['poseesj2_cat5'] = json_decode($situation->getCartesPoseesJ2_cat5());
        }else {
            $plateau['poseesj2_cat5'] = $situation->getCartesPoseesJ2_cat5();
            $plateau['poseesj2_cat5'] = array();
        }
        if (!empty($situation->getDefausse_cat1())){
            $plateau['defausse_cat1'] = $situation->getDefausse_cat1();
        }else{
            $plateau['defausse_cat1'] = $situation->getDefausse_cat1();
            $plateau['defausse_cat1'] = array();
        }
        if (!empty($situation->getDefausse_cat2())){
            $plateau['defausse_cat2'] = $situation->getDefausse_cat2();
        }else{
            $plateau['defausse_cat2'] = $situation->getDefausse_cat2();
            $plateau['defausse_cat2'] = array();
        }
        if (!empty($situation->getDefausse_cat3())){
            $plateau['defausse_cat3'] = $situation->getDefausse_cat3();
        }else{
            $plateau['defausse_cat3'] = $situation->getDefausse_cat3();
            $plateau['defausse_cat3'] = array();
        }
        if (!empty($situation->getDefausse_cat4())){
            $plateau['defausse_cat4'] = $situation->getDefausse_cat4();
        }else{
            $plateau['defausse_cat4'] = $situation->getDefausse_cat4();
            $plateau['defausse_cat4'] = array();
        }
        if (!empty($situation->getDefausse_cat5())){
            $plateau['defausse_cat5'] = $situation->getDefausse_cat5();
        }else{
            $plateau['defausse_cat5'] = $situation->getDefausse_cat5();
            $plateau['defausse_cat5'] = array();
        }
///////////////////////////////////////////////////////////////////
        $plateau['pointj1'] = $id->getPointJ1();
        $plateau['pointj1_cat1'] = $id->getPointJ1_cat1();
        $plateau['pointj1_cat2'] = $id->getPointJ1_cat2();
        $plateau['pointj1_cat3'] = $id->getPointJ1_cat3();
        $plateau['pointj1_cat4'] = $id->getPointJ1_cat4();
        $plateau['pointj1_cat5'] = $id->getPointJ1_cat5();
///////////////////////////////////////////////////////////////////
        $plateau['pointj2'] = $id->getPointJ2();
        $plateau['pointj2_cat1'] = $id->getPointJ2_cat1();
        $plateau['pointj2_cat2'] = $id->getPointJ2_cat2();
        $plateau['pointj2_cat3'] = $id->getPointJ2_cat3();
        $plateau['pointj2_cat4'] = $id->getPointJ2_cat4();
        $plateau['pointj2_cat5'] = $id->getPointJ2_cat5();
///////////////////////////////////////////////////////////////////

        $tour = $id->getTourde();

        // Id joueur actif
        $useractif=$user->getId();

        //Id joueur 1
        $joueur1=$id->getJoueur1();
        $idjoueur1=$joueur1->getId();

        //Id joueur 2
        $joueur2=$id->getJoueur2();
        $idjoueur2=$joueur2->getId();

        //Récupérer la carte sélectionnée
        $cartecheck = $request->get('cartecheck')*1;
        //Récupérer la categorie
        $categorieecheck = $request->get('categorieecheck')*1;
        //Récupérer la catégorie de cartecheck
        $categorie_carte_ajoutee = $cartes[$cartecheck]->getCategorie()->getId();
        $type_carte_ajoutee = $cartes[$cartecheck]->getType();
        $valeur_carte_ajoutee = $cartes[$cartecheck]->getValeur()*1;
        $dernière_carte_de_cette_categorie = 1;

        $nepaschangerlamain = false;

        $precedenteValeur = 1;

        if($useractif==$idjoueur1){
            //DEBUT JOUEUR 1//

            //Les bails pour que ça marche
            $em = $this->getDoctrine()->getManager();

            //Si catégorie selectionnée
            if ($categorieecheck <6) {
                // Rajouter dans la catégorie 1

                if( $categorie_carte_ajoutee == 1){
                    $dernière_carte_de_cette_categorie = $this -> derniereValeur($plateau['poseesj1_cat1']);
                    if ($plateau['pointj1_cat1'] == 0){
                        $plateau['pointj1_cat1'] -= 20;
                        $id->setPointJ1_cat1($plateau['pointj1_cat1']);
                        $plateau['pointj1'] -= 20;
                        $id->setPointJ1($plateau['pointj1']);
                        array_push( $plateau['poseesj1_cat1'],$cartecheck);
                        $nepaschangerlamain = true ;
                    }
                    if ($dernière_carte_de_cette_categorie != false){
                        //Récupérer ID de la dernière carte
                        dump($dernière_carte_de_cette_categorie);
                        //Récupérer la valeur de cette dernière carte
                        $precedenteValeur = $cartes[$dernière_carte_de_cette_categorie]->getValeur();
                        //dump($precedenteValeur);

                        if ($precedenteValeur <= $valeur_carte_ajoutee){
                            if ($type_carte_ajoutee == 'extra'){
                                $plateau['pointj1_cat1'] *= 2;
                                $id->setPointJ1_cat1($plateau['pointj1_cat1']);
                            }else{
                                $plateau['pointj1_cat1'] += $valeur_carte_ajoutee;
                                $id->setPointJ1_cat1($plateau['pointj1_cat1']);
                                $plateau['pointj1'] += $valeur_carte_ajoutee;
                                $id->setPointJ1($plateau['pointj1']);
                            }
                            array_push( $plateau['poseesj1_cat1'],$cartecheck);
                            $nepaschangerlamain = true ;
                        }
                    }

                }
                //Rajouter dans la catégorie 2
                if ( $categorie_carte_ajoutee == 2)
                {
                    $dernière_carte_de_cette_categorie = $this->derniereValeur($plateau['poseesj1_cat2']);
                    if ($plateau['pointj1_cat2'] == 0){
                        $plateau['pointj1_cat2'] -= 20;
                        $id->setPointJ1_cat2($plateau['pointj1_cat2']);
                        $plateau['pointj1'] -= 20;
                        $id->setPointJ1($plateau['pointj1']);
                        array_push( $plateau['poseesj1_cat2'],$cartecheck);
                        $nepaschangerlamain = true ;
                    }
                    if ($dernière_carte_de_cette_categorie != false) {
                        //Récupérer ID de la dernière carte
                        //dump($dernière_carte_de_cette_categorie);
                        //Récupérer la valeur de cette dernière carte
                        $precedenteValeur = $cartes[$dernière_carte_de_cette_categorie]->getValeur();
                        //dump($precedenteValeur);

                        if ($precedenteValeur <= $valeur_carte_ajoutee){

                            if ($type_carte_ajoutee == 'extra'){
                                $plateau['pointj1_cat2'] *= 2;
                                $id->setPointJ1_cat2($plateau['pointj1_cat2']);
                            }else{
                                $plateau['pointj1_cat2'] += $valeur_carte_ajoutee;
                                $id->setPointJ1_cat2($plateau['pointj1_cat2']);
                                $plateau['pointj1'] += $valeur_carte_ajoutee;
                                $id->setPointJ1($plateau['pointj1']);
                            }
                            array_push( $plateau['poseesj1_cat2'],$cartecheck);
                            $nepaschangerlamain = true;
                        }


                    }

                }
                //Rajouter dans la catégorie 3
                if ( $categorie_carte_ajoutee == 3){
                    $dernière_carte_de_cette_categorie = $this -> derniereValeur($plateau['poseesj1_cat3']);
                    if ($plateau['pointj1_cat3'] == 0){
                        $plateau['pointj1_cat3'] -= 20;
                        $id->setPointJ1_cat3($plateau['pointj1_cat3']);
                        $plateau['pointj1'] -= 20;
                        $id->setPointJ1($plateau['pointj1']);
                        array_push($plateau['poseesj1_cat3'], $cartecheck);
                        $nepaschangerlamain = true ;
                    }
                    if ($dernière_carte_de_cette_categorie != false){
                        //Récupérer ID de la dernière carte
                        dump($dernière_carte_de_cette_categorie);
                        //Récupérer la valeur de cette dernière carte
                        $precedenteValeur = $cartes[$dernière_carte_de_cette_categorie]->getValeur();
                        //dump($precedenteValeur);
                        if ($precedenteValeur <= $valeur_carte_ajoutee) {
                            if ($type_carte_ajoutee == 'extra') {
                                $plateau['pointj1_cat3'] *= 2;
                                $id->setPointJ1_cat3($plateau['pointj1_cat3']);
                            } else {
                                $plateau['pointj1_cat3'] += $valeur_carte_ajoutee;
                                $id->setPointJ1_cat3($plateau['pointj1_cat3']);
                                $plateau['pointj1'] += $valeur_carte_ajoutee;
                                $id->setPointJ1($plateau['pointj1']);
                            }
                            array_push($plateau['poseesj1_cat3'], $cartecheck);
                            $nepaschangerlamain = true;
                        }
                    }


                }
                //Rajouter dans la catégorie4
                if ( $categorie_carte_ajoutee == 4){
                    $dernière_carte_de_cette_categorie = $this->derniereValeur($plateau['poseesj1_cat4']);
                    if ($plateau['pointj1_cat4'] == 0){
                        $plateau['pointj1_cat4'] -= 20;
                        $id->setPointJ1_cat4($plateau['pointj1_cat4']);
                        $plateau['pointj1'] -= 20;
                        $id->setPointJ1($plateau['pointj1']);
                        array_push( $plateau['poseesj1_cat4'],$cartecheck);
                        $nepaschangerlamain = true ;
                    }
                    if ($dernière_carte_de_cette_categorie != false) {
                        //Récupérer ID de la dernière carte
                        dump($dernière_carte_de_cette_categorie);
                        //Récupérer la valeur de cette dernière carte
                        $precedenteValeur = $cartes[$dernière_carte_de_cette_categorie]->getValeur();
                        //dump($precedenteValeur);
                        if ($precedenteValeur <= $valeur_carte_ajoutee){
                            if ($type_carte_ajoutee == 'extra'){
                                $plateau['pointj1_cat4'] *= 2;
                                $id->setPointJ1_cat4($plateau['pointj1_cat4']);
                            }else{
                                $plateau['pointj1_cat4'] += $valeur_carte_ajoutee;
                                $id->setPointJ1_cat4($plateau['pointj1_cat4']);
                                $plateau['pointj1'] += $valeur_carte_ajoutee;
                                $id->setPointJ1($plateau['pointj1']);
                            }
                            array_push( $plateau['poseesj1_cat4'],$cartecheck);
                            $nepaschangerlamain = true ;
                        }

                    }


                }
                //Rajouter dans la catégorie 5
                if ( $categorie_carte_ajoutee == 5){
                    $dernière_carte_de_cette_categorie = $this -> derniereValeur($plateau['poseesj1_cat5']);

                    if ($plateau['pointj1_cat5'] == 0){
                        $plateau['pointj1_cat5'] -= 20;
                        $id->setPointJ1_cat5($plateau['pointj1_cat5']);
                        $plateau['pointj1'] -= 20;
                        $id->setPointJ1($plateau['pointj1']);
                        array_push( $plateau['poseesj1_cat5'],$cartecheck);
                        $nepaschangerlamain = true ;

                    }
                    if ($dernière_carte_de_cette_categorie != false){

                        //Récupérer ID de la dernière carte
                        dump($dernière_carte_de_cette_categorie);
                        //Récupérer la valeur de cette dernière carte
                        $precedenteValeur = $cartes[$dernière_carte_de_cette_categorie]->getValeur();
                        dump($dernière_carte_de_cette_categorie);
                        dump($plateau['poseesj1_cat5']);

                        if ($precedenteValeur <= $valeur_carte_ajoutee){
                            if ($type_carte_ajoutee == 'extra'){
                                $plateau['pointj1_cat5'] *= 2;
                                $id->setPointJ1_cat5($plateau['pointj1_cat5']);
                            }else{
                                $plateau['pointj1_cat5'] += $valeur_carte_ajoutee;
                                $id->setPointJ1_cat5($plateau['pointj1_cat5']);
                                $plateau['pointj1'] += $valeur_carte_ajoutee;
                                $id->setPointJ1($plateau['pointj1']);
                            }
                            array_push( $plateau['poseesj1_cat5'],$cartecheck);
                            $nepaschangerlamain = true ;
                        }
                    }
                }
            }
            //Si defausse selectionnée
            if ($categorieecheck >5) {
                // Rajouter dans la catégorie 1
                if( $categorie_carte_ajoutee == 1){
                    array_push( $plateau['defausse_cat1'],$cartecheck);
                    $situation->setDefausse_cat1($plateau['defausse_cat1']);
                }
                //Rajouter dans la catégorie 2
                if ( $categorie_carte_ajoutee == 2)
                {
                    array_push( $plateau['defausse_cat2'],$cartecheck);
                    $situation->setDefausse_cat2($plateau['defausse_cat2']);
                }
                //Rajouter dans la catégorie 3
                if ( $categorie_carte_ajoutee == 3){
                    array_push( $plateau['defausse_cat3'],$cartecheck);
                    $situation->setDefausse_cat3($plateau['defausse_cat3']);
                }
                //Rajouter dans la catégorie4
                if ( $categorie_carte_ajoutee == 4){
                    array_push( $plateau['defausse_cat4'],$cartecheck);
                    $situation->setDefausse_cat4($plateau['defausse_cat4']);
                }
                //Rajouter dans la catégorie 5
                if ( $categorie_carte_ajoutee == 5){
                    array_push( $plateau['defausse_cat5'],$cartecheck);
                    $situation->setDefausse_cat5($plateau['defausse_cat5']);
                }
            }

                //Set dans les categories
                $situation->setCartesPoseesJ1_cat1(json_encode($plateau['poseesj1_cat1']));
                $situation->setCartesPoseesJ1_cat2(json_encode($plateau['poseesj1_cat2']));
                $situation->setCartesPoseesJ1_cat3(json_encode($plateau['poseesj1_cat3']));
                $situation->setCartesPoseesJ1_cat4(json_encode($plateau['poseesj1_cat4']));
                $situation->setCartesPoseesJ1_cat5(json_encode($plateau['poseesj1_cat5']));
            //Récup l'id de la partie
            $partie=$situation->getId();



            //Les bails pour que ça marche
            $em->persist($situation);
            $em->flush();
            //UPDATE LA MAIN DU JOUEUR
            $mainj1 = array();
            $mainj1 = $plateau['mainJ1'];
            if ($nepaschangerlamain == false){
                $nouvellemainj1 = $mainj1 ;
            }
            if ($nepaschangerlamain == true ){
                $nouvellemainj1 = $this->supprimeCarteMain($mainj1,$cartecheck);
            }
            $em = $this->getDoctrine()->getManager();
            $nouvellemainj1encode = json_encode($nouvellemainj1);
            $situation->setMainJ1($nouvellemainj1encode);
            $em->persist($situation);
            $em->flush();




            //FIN JOUEUR 1//
        }

        if($useractif==$idjoueur2){
            //DEBUT JOUEUR 2//

            //Les bails pour que ça marche
            $em = $this->getDoctrine()->getManager();
            $mainj2 = $plateau['mainJ2'];

            $nepaschangerlamain = false;
            $precedenteValeur = 0;

            $precedenteValeur = 1;

            //Si catégorie selectionnée
            if ($categorieecheck <6) {

                // Rajouter dans la catégorie 1
                if( $categorie_carte_ajoutee == 1){
                    $dernière_carte_de_cette_categorie = $this -> derniereValeur($plateau['poseesj2_cat1']);
                    if ($plateau['pointj2_cat1'] == 0){
                        $plateau['pointj2_cat1'] -= 20;
                        $id->setPointJ2_cat1($plateau['pointj2_cat1']);
                        $plateau['pointj2'] -= 20;
                        $id->setPointJ2($plateau['pointj2']);
                        array_push( $plateau['poseesj2_cat1'],$cartecheck);
                        $nepaschangerlamain = true ;
                    }
                    if ($dernière_carte_de_cette_categorie != false){
                        //Récupérer ID de la dernière carte
                        //dump($dernière_carte_de_cette_categorie);
                        //Récupérer la valeur de cette dernière carte
                        $precedenteValeur = $cartes[$dernière_carte_de_cette_categorie]->getValeur();
                        //dump($precedenteValeur);

                        if ($precedenteValeur <= $valeur_carte_ajoutee){
                            if ($type_carte_ajoutee == 'extra'){
                                $plateau['pointj2_cat1'] *= 2;
                                $id->setPointJ2_cat1($plateau['pointj2_cat1']);
                            }else{
                                $plateau['pointj2_cat1'] += $valeur_carte_ajoutee;
                                $id->setPointJ2_cat1($plateau['pointj2_cat1']);
                                $plateau['pointj2'] += $valeur_carte_ajoutee;
                                $id->setPointJ2($plateau['pointj2']);
                            }
                            array_push( $plateau['poseesj2_cat1'],$cartecheck);
                            $nepaschangerlamain = true ;
                        }
                    }

                }

                //Rajouter dans la catégorie 2
                if ( $categorie_carte_ajoutee == 2){
                    $dernière_carte_de_cette_categorie = $this->derniereValeur($plateau['poseesj2_cat2']);
                    if ($plateau['pointj2_cat2'] == 0){
                        $plateau['pointj2_cat2'] -= 20;
                        $id->setPointJ2_cat2($plateau['pointj2_cat2']);
                        $plateau['pointj2'] -= 20;
                        $id->setPointJ2($plateau['pointj2']);
                        array_push( $plateau['poseesj2_cat2'],$cartecheck);
                        $nepaschangerlamain = true;
                    }
                    if ($dernière_carte_de_cette_categorie != false) {
                        //Récupérer ID de la dernière carte
                        //dump($dernière_carte_de_cette_categorie);
                        //Récupérer la valeur de cette dernière carte
                        $precedenteValeur = $cartes[$dernière_carte_de_cette_categorie]->getValeur();
                        //dump($precedenteValeur);

                        if ($precedenteValeur <= $valeur_carte_ajoutee){

                            if ($type_carte_ajoutee == 'extra'){
                                $plateau['pointj2_cat2'] *= 2;
                                $id->setPointJ2_cat2($plateau['pointj2_cat2']);
                            }else{
                                $plateau['pointj2_cat2'] += $valeur_carte_ajoutee;
                                $id->setPointJ2_cat2($plateau['pointj2_cat2']);
                                $plateau['pointj2'] += $valeur_carte_ajoutee;
                                $id->setPointJ2($plateau['pointj2']);
                            }
                            array_push( $plateau['poseesj2_cat2'],$cartecheck);
                            $nepaschangerlamain = true;
                        }


                    }

                }

                //Rajouter dans la catégorie 3
                if ( $categorie_carte_ajoutee == 3){
                    $dernière_carte_de_cette_categorie = $this -> derniereValeur($plateau['poseesj2_cat3']);
                    if ($plateau['pointj2_cat3'] == 0){
                        $plateau['pointj2_cat3'] -= 20;
                        $id->setPointJ2_cat3($plateau['pointj2_cat3']);
                        $plateau['pointj2'] -= 20;
                        $id->setPointJ2($plateau['pointj2']);
                        array_push($plateau['poseesj2_cat3'], $cartecheck);
                        $nepaschangerlamain = true;


                    }
                    if ($dernière_carte_de_cette_categorie != false){
                        //Récupérer ID de la dernière carte

                        //Récupérer la valeur de cette dernière carte
                        $precedenteValeur = $cartes[$dernière_carte_de_cette_categorie]->getValeur();

                        if ($precedenteValeur <= $valeur_carte_ajoutee) {
                            if ($type_carte_ajoutee == 'extra') {
                                $plateau['pointj2_cat3'] *= 2;
                                $id->setPointJ2_cat3($plateau['pointj2_cat3']);
                            } else {
                                $plateau['pointj2_cat3'] += $valeur_carte_ajoutee;
                                $id->setPointJ2_cat3($plateau['pointj2_cat3']);
                                $plateau['pointj2'] += $valeur_carte_ajoutee;
                                $id->setPointJ2($plateau['pointj2']);
                            }
                           array_push($plateau['poseesj2_cat3'], $cartecheck);
                           $nepaschangerlamain = true;
                        }
                    }


                }

                //Rajouter dans la catégorie4
                if ( $categorie_carte_ajoutee == 4){
                    $dernière_carte_de_cette_categorie = $this->derniereValeur($plateau['poseesj2_cat4']);
                    if ($plateau['pointj2_cat4'] == 0){
                        $plateau['pointj2_cat4'] -= 20;
                        $id->setPointJ2_cat4($plateau['pointj2_cat4']);
                        $plateau['pointj2'] -= 20;
                        $id->setPointJ2($plateau['pointj2']);
                        array_push( $plateau['poseesj2_cat4'],$cartecheck);
                        $nepaschangerlamain = true ;
                    }
                    if ($dernière_carte_de_cette_categorie != false) {
                        //Récupérer ID de la dernière carte
                        //dump($dernière_carte_de_cette_categorie);
                        //Récupérer la valeur de cette dernière carte
                        $precedenteValeur = $cartes[$dernière_carte_de_cette_categorie]->getValeur();
                        //dump($precedenteValeur);
                        if ($precedenteValeur >= $valeur_carte_ajoutee){
                            if ($type_carte_ajoutee == 'extra'){
                                $plateau['pointj2_cat4'] *= 2;
                                $id->setPointJ2_cat4($plateau['pointj2_cat4']);
                            }else{
                                $plateau['pointj2_cat4'] += $valeur_carte_ajoutee;
                                $id->setPointJ2_cat4($plateau['pointj2_cat4']);
                                $plateau['pointj2'] += $valeur_carte_ajoutee;
                                $id->setPointJ2($plateau['pointj2']);
                            }
                            array_push( $plateau['poseesj2_cat4'],$cartecheck);
                            $nepaschangerlamain = true ;
                        }

                    }


                }

                //Rajouter dans la catégorie 5
                if ( $categorie_carte_ajoutee == 5){
                    $dernière_carte_de_cette_categorie = $this -> derniereValeur($plateau['poseesj2_cat5']);

                    if ($plateau['pointj2_cat5'] == 0){
                        $plateau['pointj2_cat5'] -= 20;
                        $id->setPointJ2_cat5($plateau['pointj2_cat5']);
                        $plateau['pointj2'] -= 20;
                        $id->setPointJ2($plateau['pointj2']);
                        array_push( $plateau['poseesj2_cat5'],$cartecheck);
                        $nepaschangerlamain = true ;

                    }
                    if ($dernière_carte_de_cette_categorie != false){
                        //Récupérer ID de la dernière carte
                        //dump($dernière_carte_de_cette_categorie);
                        //Récupérer la valeur de cette dernière carte
                        $precedenteValeur = $cartes[$dernière_carte_de_cette_categorie]->getValeur();
                        //dump($precedenteValeur);

                        if ($precedenteValeur >= $valeur_carte_ajoutee){
                            if ($type_carte_ajoutee == 'extra'){
                                $plateau['pointj2_cat5'] *= 2;
                                $id->setPointJ2_cat5($plateau['pointj2_cat5']);
                            }else{
                                $plateau['pointj2_cat5'] += $valeur_carte_ajoutee;
                                $id->setPointJ2_cat5($plateau['pointj2_cat5']);
                                $plateau['pointj2'] += $valeur_carte_ajoutee;
                                $id->setPointJ2($plateau['pointj2']);
                            }
                            array_push( $plateau['poseesj2_cat5'],$cartecheck);
                            $nepaschangerlamain = true ;
                        }
                    }
                }
            }
            //Si défausse selectionnée
            if ($categorieecheck >5) {
                // Rajouter dans la catégorie 1
                if( $categorie_carte_ajoutee == 1){
                    array_push( $plateau['defausse_cat1'],$cartecheck);
                    $situation->setDefausse_cat1($plateau['defausse_cat1']);
                }
                //Rajouter dans la catégorie 2
                if ( $categorie_carte_ajoutee == 2)
                {
                    array_push( $plateau['defausse_cat2'],$cartecheck);
                    $situation->setDefausse_cat2($plateau['defausse_cat2']);
                }
                //Rajouter dans la catégorie 3
                if ( $categorie_carte_ajoutee == 3){
                    array_push( $plateau['defausse_cat3'],$cartecheck);
                    $situation->setDefausse_cat3($plateau['defausse_cat3']);
                }
                //Rajouter dans la catégorie4
                if ( $categorie_carte_ajoutee == 4){
                    array_push( $plateau['defausse_cat4'],$cartecheck);
                    $situation->setDefausse_cat4($plateau['defausse_cat4']);
                }
                //Rajouter dans la catégorie 5
                if ( $categorie_carte_ajoutee == 5){
                    array_push( $plateau['defausse_cat5'],$cartecheck);
                    $situation->setDefausse_cat5($plateau['defausse_cat5']);
                }
            }

            //Set dans les categories
            $situation->setCartesPoseesJ2_cat1(json_encode($plateau['poseesj2_cat1']));
            $situation->setCartesPoseesJ2_cat2(json_encode($plateau['poseesj2_cat2']));
            $situation->setCartesPoseesJ2_cat3(json_encode($plateau['poseesj2_cat3']));
            $situation->setCartesPoseesJ2_cat4(json_encode($plateau['poseesj2_cat4']));
            $situation->setCartesPoseesJ2_cat5(json_encode($plateau['poseesj2_cat5']));

            //Recup id de la partie
            $partie=$situation->getId();
            //Les bails pour que ça marche
            $em->persist($situation);
            $em->flush();
            //UPDATE LA MAIN DU JOUEUR
            $mainj2 = array();
            $mainj2 = $plateau['mainJ2'];

            $nouvellemainj2 = $this->supprimeCarteMain($mainj2,$cartecheck);

            $em = $this->getDoctrine()->getManager();
            $nouvellemainj2encode = json_encode($nouvellemainj2);
            $situation->setMainJ2($nouvellemainj2encode);
            $em->persist($situation);
            $em->flush();
            //FIN JOUEUR 2//
        }

        //return $this->render(':joueur:poser.html.twig', ['toto' => $dernière_carte_de_cette_categorie , 'categorieecheck'=>$categorieecheck,'cartecheck' => $cartecheck, 'cartes' => $cartes, 'partie' => $id, 'user' => $user, 'plateau' => $plateau, 'tour' => $tour, 'plateau' => $plateau, 'situation' => $situation, 'parte' =>'$partie']);
        return $this->redirectToRoute('afficher_partie', ['id' => $id->getId()]);
    }

    private function supprimeCarteMain($mainj1,$cartecheck)
    {
        $t =array();
        foreach ($mainj1 as $m)
        {
         if ($m != $cartecheck)
         {
             $t[] = $m;
         }
        }

        return $t;
    }

    private function derniereValeur($array)
    {
        end($array);
        return end($array);
    }
}