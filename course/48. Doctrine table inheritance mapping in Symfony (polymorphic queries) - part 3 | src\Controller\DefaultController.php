<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Services\GiftsService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Author;
use App\Entity\File;
use App\Entity\Pdf;
use App\Entity\Video;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="default")
     */
    public function index(GiftsService $gifts, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $author = $entityManager->getRepository(Author::class)->findByIdWithPdf(1);
        dump($author);
        foreach($author->getFiles() as $file)
        {
            // if($file instanceof Pdf)
            dump($file->getFileName());
        }

        // $users = [];
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'random_gift' => $gifts->gifts,
        ]);
    }  
    
}
