<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

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
    public function index(GiftsService $gifts, SessionInterface $session, Request $request)
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

        # Flash Messages
        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );

        $this->addFlash(
            'warning',
            'Your changes were saved!'
        );

        # Coockie (create)
        // $cookie = new Cookie(
        //     'my_cookie',  // Cookie name
        //     'cookie_value',  // Cookie value
        //     time() + ( 2 * 365 * 24 * 60 * 60)  // Expires after 2 years
        // );

        // $res = new Response();
        // $res->headers->setCookie($cookie);
        // $res->send();

        # Cookie (clear)
        // $res = new Response();
        // $res->headers->clearCookie('my_cookie');
        // $res->send();

        # Get data from cookies
        // exit($request->cookies->get('PHPSESSID'));

        # Session
        $session->set('name', 'session value');
        // $session->remove('name');  # Remove session data that only 'name'
        // $session->clear();  # Remove all session data
        if($session->has('name')) 
        {
            exit($session->get('name'));
        }

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
