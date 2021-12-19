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
        // $entityManager = $this->getDoctrine()->getManager();
        // $user = $entityManager->getRepository(User::class)->find(1);
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController'
        ]);
    }  

    public function mostPopularPosts($number = 3)
    {
         // database call:
         $posts = ['post 1', 'post 2', 'posts 3', 'posts 4'];
         return $this->render('default/most_popular_posts.html.twig', [
            'posts' => $posts,
         ]);
    }
    
}
