<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route(path: "/", methods: ['GET'])]
    public function index(): Response
    {
        return new Response(
            'HELLO WORLD'
        );
    }
}