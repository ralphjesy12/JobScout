<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Task;

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
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $repository = $this->getDoctrine()
        ->getRepository('AppBundle:Task');

        $query = $repository->createQueryBuilder('t')
        ->where('t.userId = :user')
        ->setParameter('user',$user->getId())
        ->orderBy('t.createdAt', 'DESC')
        ->getQuery();

        $tasks = $query->getResult();

        return $this->render('todos/index.html.twig',compact(['user','tasks']));
    }

    /**
    * @Route("/todo/create", name="todo_create")
    */
    public function todoCreateAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        return $this->render('todos/create.html.twig',compact(['user']));
    }

    /**
    * @Route("/todo/save", name="todo_save")
    */
    public function todoSaveAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $task = new Task();
        $task->setContent($request->get('content'));
        $task->setCreatedAt(date('Y-m-d H:i:s'));
        $task->setUserId($user->getId());
        $em = $this->getDoctrine()->getManager();
        $em->persist($task);
        $em->flush();
        return $this->redirectToRoute('todos');
    }

    public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }
}
