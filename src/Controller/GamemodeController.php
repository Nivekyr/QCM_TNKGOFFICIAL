<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GamemodeController extends AbstractController
{
    #[Route('/gamemode', name: 'app_gamemode')]
    public function index(): Response
    {
        return $this->render('gamemode/index.html.twig', [
            'controller_name' => 'GamemodeController',
        ]);
    }
}
