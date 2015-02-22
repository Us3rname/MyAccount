<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 2/18/2015
 * Time: 10:09 AM
 */

namespace MyAccount\LoginBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller {

    public function indexAction()
    {
        return $this->render('LoginBundle:Login:index.html.twig');
    }

    /**
     * @Route("/login_check", name="_security_check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/logout", name="_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
    }
}