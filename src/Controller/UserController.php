<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function createUser(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setpseudo('Thomas');
        $user->setPasswd('root');
       // $user->setDate(10/10/20);
        $user->setabout("je suis un utilisateur");

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response(' Nouvel utilisateur avec l id '.$user->getId());
    }
}
