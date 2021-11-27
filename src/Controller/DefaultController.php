<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        # Users array
        // $users = ['Masrud','Mubarok'];

        # Insert users to database
        // $entityManager = $this->getDoctrine()->getManager();
        // $user = new User;
        // $user->setName('Ahmad');
        // $user2 = new User;
        // $user2->setName('Mubarok');
        // $entityManager->persist($user);
        // $entityManager->persist($user2);
        // exit($entityManager->flush());

        # Read users data that was inserted into database
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
        ]);
        
    }
}
