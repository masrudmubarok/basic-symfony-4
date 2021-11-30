<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Services\GiftsService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="default")
     */
    public function index(GiftsService $gifts, Request $request)
    {
        // $users = [];
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        // exit($request->query->get('page', 'default'));
        exit($request->server->get('HTTP_HOST'));
        $request->isXmlHttpRequest(); // is it an Ajax request?
        $request->request->get('page');
        $request->files->get('foo');
        

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'random_gift' => $gifts->gifts,
        ]);
    }  
    
}
