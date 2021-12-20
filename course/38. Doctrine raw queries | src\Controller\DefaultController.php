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

        $conn = $entityManager->getConnection();
        $sql = '
        SELECT * FROM user u
        WHERE u.id > :id
        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => 3]);

        dump($stmt->fetchAll());
        
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController'
        ]);
    }  
    
}
