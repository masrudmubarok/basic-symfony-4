<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Services\GiftsService;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="default")
     */
    public function index(GiftsService $gifts)
    {
        // $users = [];
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
    
    
    
}

------------------------------------------------------------------------------------------------------

{# templates/default/index.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}Hello {{ controller_name }}!{% endblock %}

{% block body %}
<style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
</style>

<div class="example-wrapper">
    <h1>Hello {{ controller_name }}! ✅</h1>

    This friendly message is coming from:
    <ul>
        <li>Your controller at <code><a href="{{ 'src/Controller/DefaultController.php'|file_link(0) }}">src/Controller/DefaultController.php</a></code></li>
        <li>Your template at <code><a href="{{ 'templates/default/index.html.twig'|file_link(0) }}">templates/default/index.html.twig</a></code></li>
    </ul>
    <ul>
    {% for user in users %}
    <li>{{user.name}} - you won {{random_gift[loop.index0]}}</li>
    {% endfor %}
    </ul>

    {% for message in app.flashes('notice') %}
    <div class="flash-notice">
        {{ message }}
    </div>
    {% endfor %}

    {% for label, messages in app.flashes %}
        {% for message in messages %}
            <div class="flash-{{ label }}">
                {{ message }}
            </div>
        {% endfor %}
    {% endfor %}

</div>
{% endblock %}
