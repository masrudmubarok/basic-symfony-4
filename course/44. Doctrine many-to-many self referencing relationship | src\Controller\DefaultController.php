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


class DefaultController extends AbstractController
{

    /**
     * @Route("/home", name="default", name="home")
     */
    public function index(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        // for ($i = 1; $i <= 4; $i++)
        // {
        //     $user = new User();
        //     $user->setName('Robert -' . $i);
        //     $entityManager->persist($user);
        // }
        // $entityManager->flush();
        // dump('last user id - '.$user->getId());

        $user1 = $entityManager->getRepository(User::class)->find(1);
        $user2 = $entityManager->getRepository(User::class)->find(2);
        $user3 = $entityManager->getRepository(User::class)->find(3);
        $user4 = $entityManager->getRepository(User::class)->find(4);

        // $user1->addFollowed($user2);
        // $user1->addFollowed($user3);
        // $user1->addFollowed($user4);
        // $entityManager->flush();
         dump($user1->getFollowed()->count());
         dump($user1->getFollowing()->count());
         dump($user4->getFollowing()->count());

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController'
        ]);
    }  
    
}
