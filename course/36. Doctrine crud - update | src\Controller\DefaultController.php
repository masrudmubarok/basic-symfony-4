<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends AbstractController
{

    /**
     * @Route("/home", name="default", name="home")
     */
    public function index(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $id = 1;
        $user = $entityManager->getRepository(User::class)->find($id);

        if (!$user)
        {
            throw $this->createNotFoundException(
                'No user found for id '.$id
            );
        }
        $user->setName('New user name!');
        $entityManager->flush();

        dump($user);
        
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController'
        ]);
    }  
    
}
