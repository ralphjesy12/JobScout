<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{
    /**
    * @Route("/register", name="user_registration")
    */
    public function registerAction(Request $request)
    {
        $user = new User();
        $errors = [];
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $this->get('security.password_encoder')
            ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();


            $this->addFlash(
                'success',
                'User registered successfully'
            );

            return $this->redirectToRoute('user_registration');
        }else{

            $errors = [];
            foreach ($form->getErrors(true, true) as $formError) {
                $errors[] = $formError->getMessage();
            }

        }

        return $this->render(
            'auth/register.html.twig',
            array('form' => $form->createView(),'errors' => $errors)
        );
    }
}
