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

    public function logoutAction()
    {
        return $this->render('LoginBundle:Login:logout.html.twig');
    }
}