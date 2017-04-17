<?php
/**
 * Created by PhpStorm.
 * User: Florine
 * Date: 17/04/2017
 * Time: 14:52
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
 * @Route("mail")
 */
class MailController extends Controller
{
    /**
     * @Route("/", name="lancement_partie")
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $aqui = $user->getEmail();
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('florine-bignon@orange.fr')
            ->setTo($aqui)
            ->setBody(
                $this->renderView(
                // app/Resources/views/mails/lancementpartie.html.twig
                    'mail/lancementpartie.html.twig',
                    array('name' => $user)
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;
        $this->get('mailer')->send($message);

        return $this->render(':mail:lancementpartie.html.twig');
    }
}