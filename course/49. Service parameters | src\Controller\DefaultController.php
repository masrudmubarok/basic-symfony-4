<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Video;
use App\Entity\Address;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Services\MyService;


class DefaultController extends AbstractController
{

    /**
     * @Route("/home", name="default", name="home")
     */
    public function index(Request $request,  MyService $service)
    {
        $entityManager = $this->getDoctrine()->getManager();

    
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController'
        ]);
    }  
    
}
