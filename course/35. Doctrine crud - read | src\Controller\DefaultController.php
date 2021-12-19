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
        $repository = $this->getDoctrine()->getRepository(User::class);
        // $user = $repository->find(1);
        // $user = $repository->findOneBy(['name' => 'Robert']);
        // $user = $repository->findOneBy(['name' => 'Robert', 'id' => 5]);
        // $users = $repository->findBy(['name' => 'Robert'],['id' => 'DESC']);
        $users = $repository->findAll();
        dump($users);
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController'
        ]);
    }  
    
}
