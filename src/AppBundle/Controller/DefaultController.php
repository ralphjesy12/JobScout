<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
    * @Route("/todos", name="todos")
    */
    public function todosAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('todos/index.html.twig');
    }

    public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }
}
