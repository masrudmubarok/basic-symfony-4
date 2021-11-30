<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    # GiftService using construction
    // public function __construct(GiftsService $gifts)
    // {
    //     $gifts->gifts = ['a','b','c'];
    // }

    /**
     * @Route("/", name="default")
     */
    public function index(GiftsService $gifts)
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

        # Read users form Sqlite database
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );

        $this->addFlash(
            'warning',
            'Your changes were saved!'
        );

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'random_gift' => $gifts->gifts,
        ]);
        
    }

    /**
     * @Route("/blog/{page?}", name="blog list", requirements={"page"="\d+"})
     */
    public function index2()
    {
        return new Response('Optional parameters in url and requirement for parameters, the parameters should be digit or number');
    }

    /**
     * @Route(
     *      "/articles/{_locale}/{year}/{slug}/{category}",
     *      defaults={"category": "computers"},
     *      requirements={
     *         "_locale": "en|fr", 
     *          "category": "computers|rtv",
     *          "year": "\d+"
     *      }    
     * )
     */
    public function index3()
    {
        return new Response('An advanced route example');
    }

    /**
     * @Route({
     *      "nl": "/over-ons",
     *      "en": "/about-us",
     * }, name="about_us")
     */
    public function index4()
    {
        return new Response('Translated routes');
    }
}
