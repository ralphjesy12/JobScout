<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends Controller
{
    /**
    * @Route("/", name="home")
    */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        if( $this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('todos');
        }
        return $this->redirectToRoute('login');
    }
    /**
    * @Route("/login", name="login")
    */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        // replace this example code with whatever you need
        return $this->render('auth/login.html.twig',[
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
}
