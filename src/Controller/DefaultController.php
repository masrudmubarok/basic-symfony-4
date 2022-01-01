<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Author;
use App\Entity\File;
use App\Entity\Pdf;
use App\Entity\Video;
use App\Entity\Address;
use App\Services\GiftsService;
use Doctrine\ORM\EntityManager;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Services\MyService;

class DefaultController extends AbstractController
{

    # GiftService using construction
    // public function __construct(GiftsService $gifts)
    // {
    //     $gifts->gifts = ['a','b','c'];
    // }


    # Binding Services (logger) to Controllers
    // public function __construct($logger)
    // {
    //     // use service logger
    // }


    /**
     * @Route("/home", name="default", name="home")
     */
    public function index(GiftsService $gifts, SessionInterface $session, Request $request, MyService $service)
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


        # Flash Messages
        // $this->addFlash(
        //     'notice',
        //     'Your changes were saved!'
        // );

        // $this->addFlash(
        //     'warning',
        //     'Your changes were saved!'
        // );


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
        // $session->set('name', 'session value');
        // $session->remove('name');  # Remove session data that only 'name'
        // $session->clear();  # Remove all session data
        // if($session->has('name')) 
        // {
        //     exit($session->get('name'));
        // }


        # GET POST Data
        // exit($request->query->get('page', 'default'));


        # GET POST Data (display server name)
        // exit($request->server->get('HTTP_HOST'));
        // $request->isXmlHttpRequest();  // is it an Ajax request?
        // $request->request->get('page');
        // $request->files->get('foo'); // Upload html file, foo HTML file element


        # Handling Exceptions
        // if($users) 
        // {
        //     throw $this->createNotFoundException('The users do not exist');
        // }


        # Read users form Sqlite database
        // $users = $this->getDoctrine()->getRepository(User::class)->findAll();


        # Doctrine crud - create
        // $entityManager = $this->getDoctrine()->getManager();

        // $user = new User();
        // $user->setName('Masrud');
        // $entityManager->persist($user);
        // $entityManager->flush();

        // dump('A new user was saved with the id of '. $user->getId());


        # Doctrine crud - read
        // $repository = $this->getDoctrine()->getRepository(User::class);
        // // $user = $repository->find(5);
        // // $user = $repository->findOneBy(['name' => 'Masrud']);
        // // $user = $repository->findOneBy(['name' => 'Masrud', 'id' => 10]);
        // // $user = $repository->findBy(['name' => 'Masrud'],['id' => 'DESC']);
        // $user = $repository->findAll();
        // dump($user);


        # Doctrine crud - update
        // $entityManager = $this->getDoctrine()->getManager();

        // $id = 11;
        // $user = $entityManager->getRepository(User::class)->find($id);

        // if (!$user) {
        //     throw $this->createNotFoundException(
        //         'No user found for id '.$id
        //     );
        // }
        // $user->setName('New Masrud');
        // $entityManager->flush();

        // dump($user);


        # Doctrine crud - delete
        // $entityManager = $this->getDoctrine()->getManager();

        // $id = 12;
        // $user = $entityManager->getRepository(User::class)->find($id);

        // $entityManager->remove($user);
        // $entityManager->flush();

        // dump($user);


        # Doctrine raw queries
        // $entityManager = $this->getDoctrine()->getManager();

        // $conn = $entityManager->getConnection();
        // $sql = '
        // SELECT * FROM user u
        // WHERE u.id > :id
        // ';
        // $stmt = $conn->prepare($sql);
        // $stmt->execute(['id' => 3]);

        // dump($stmt->fetchAll());


        # Doctrine query builder
        // $repository = $this->getDoctrine()->getRepository(User::class);

        // $query = $repository->createQueryBuilder('u')
        //     ->getQuery();

        // $user = $query->getResult();
        // dump($user);


        # Doctrine param converter
        // dump($user);


        # Doctrine LifecycleCallbacks
        // $entityManager = $this->getDoctrine()->getManager();
        // $user = new User();
        // $user->setName('Samrud');
        // $entityManager->persist($user);
        // $entityManager->flush();

        
        # Doctrine one-to-many & many-to-one relationships
        // $entityManager = $this->getDoctrine()->getManager();

        #/ Insert data user including video
        // $user = new User();
        // $user->setName('Joko');

        // for($i=1; $i<=3; $i++)
        // {
        //     $video = new Video();
        //     $video->setTitle('Video title -'. $i);
        //     $user->addVideo($video);
        //     $entityManager->persist($video);
        // }

        // $entityManager->persist($user);
        // $entityManager->flush();

        // dump('Created a video with id of '. $video->getId());
        // dump('Created a video with id of '. $user->getId());

        #/ Read data user by id video
        // $video = $this->getDoctrine()
        // ->getRepository(Video::class)
        // ->find(1);
        // dump($video->getUser()->getName());

        // #/ Read data video by id user
        // $user = $this->getDoctrine()
        // ->getRepository(User::class)
        // ->find(1);

        // foreach($user->getVideos() as $video)
        // {
        //     dump($video->getTitle());
        // }


        # Doctrine database relationships - cascade remove ralated objects
        // $entityManager = $this->getDoctrine()->getManager();

        // #/ Delete user data test
        // $user = $this->getDoctrine()
        // ->getRepository(User::class)
        // ->find(1);

        // $video = $this->getDoctrine()
        // ->getRepository(Video::class)
        // ->find(1);

        // $user->removeVideo($video);
        // $entityManager->flush();

        // foreach($user->getVideos() as $video)
        // {
        //     dump($video->getTitle());
        // }

        // $entityManager->remove($user);
        // $entityManager->flush();

        // dump($user);


        # Doctrine one-to-one relationship
        // $entityManager = $this->getDoctrine()->getManager();

        // $user = new User();
        // $user->setName('Mubarok');
        // $address = new Address();
        // $address->setStreet('Jl Mangga');
        // $address->setNumber(22);
        // $user->setAddress($address);

        // $entityManager->persist($user);
        // $entityManager->persist($address); // required, if `cascade: persist` is not set
        // $entityManager->flush();

        // dump($user->getAddress()->getStreet());


        # Doctrine many-to-many relationship
        // $entityManager = $this->getDoctrine()->getManager();

        #/ Add batch users
        // for ($i = 1; $i <= 4; $i++)
        // {
        //     $user = new User();
        //     $user->setName('Masrud - '. $i);
        //     $entityManager->persist($user);
        // }
        // $entityManager->flush();
        // dump('Last user id - '. $user->getId());

        #/ Add following users
        // $user1 = $entityManager->getRepository(User::class)->find(1);
        // $user2 = $entityManager->getRepository(User::class)->find(2);
        // $user3 = $entityManager->getRepository(User::class)->find(3);
        // $user4 = $entityManager->getRepository(User::class)->find(4);

        // $user1->addFollowed($user2);
        // $user1->addFollowed($user3);
        // $user1->addFollowed($user4);
        // $entityManager->flush();

        #/ Check followed/following users
        // dump($user1->getFollowed()->count());
        // dump($user1->getFollowing()->count());
        // dump($user4->getFollowing()->count());


        # Doctrine Query Builder & eager loading
        // $entityManager = $this->getDoctrine()->getManager();

        #/ Adding user with videos
        // $user = new User();
        // $user->setName('Mubarok');

        // for ($i = 1; $i <= 3; $i++)
        // {
        //     $video = new Video();
        //     $video->setTitle('Video title - '. $i);
        //     $user->addVideo($video);
        //     $entityManager->persist($video);
        // }

        // $entityManager->persist($user);
        // $entityManager->flush();

        #/ Check user with videos
        // $user = $entityManager->getRepository(User::class)->findWithVideos(6);
        // dump($user);


        # Doctrine table inheritance mapping in Symfony (polymorphic queries)
        // $entityManager = $this->getDoctrine()->getManager();
        
        #/ Load Pdf data
        // $pdf = $entityManager->getRepository(Pdf::class)->findAll();
        // dump($pdf);

        #/ Load Video data
        // $video = $entityManager->getRepository(Video::class)->findAll();
        // dump($video);

        #/ Load File data (Pdf and Video)
        // $file = $entityManager->getRepository(File::class)->findAll();
        // dump($file);

        #/ Load Author with any Files data (Pdf and Video)
        // $author = $entityManager->getRepository(Author::class)->findByIdWithPdf(1);
        // dump($author);

        // foreach($author->getFiles() as $files)
        // {
        //     # if($files instanceof Pdf) // withe spesific file type
        //     dump($files->getFileName());
        // }

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            // 'users' => $users,
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

    /**
     * @Route("/generate-url{param?}", name="generate_url")
     */
    public function generate_url()
    {
        exit($this->generateUrl(
            'generate_url',
            array('param' => 10),
            UrlGeneratorInterface::ABSOLUTE_URL
        ));
    }

    /**
     * @Route("/download")
     */
    public function download()
    {
        $path = $this->getParameter('download_directory');
        return $this->file($path.'file.pdf');
    }

    /**
     * @Route("/redirect-test")
     */
    public function redirectTest()
    {
        return $this->redirectToRoute('route_to_redirect', array('param' => 10));
    }

    /**
     * @Route("/url-to-redirect/{param?}", name="route_to_redirect")
     */
    public function methodToRedirect()
    {
        exit('Test redirection');
    }

    /**
     * @Route("/forwarding-to-controller")
     */
    public function forwardingToController()
    {
        $response = $this->forward(
            'App\Controller\DefaultController::methodToForwardTo',
            array('param' => '21')
        );
        return $response;
    }

    /**
     * @Route("/url-to-forward-to/{param?}", name="route_to_forward_to")
     */
    public function methodToForwardTo($param)
    {
        exit('Test controller forwarding - '.$param);
    }

    public function mostPopularPosts($number = 3)
    {
        // database call;
        $posts = ['post1','post2','post3','post4'];
        return $this->render('default/most_popular_posts.html.twig', [
            'posts' => $posts,
        ]);
    }
}
