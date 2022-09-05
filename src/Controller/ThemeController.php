<?php

namespace App\Controller;

use App\Entity\Theme;
use App\Repository\ThemeRepository;
use App\Entity\Topic;
use App\Repository\TopicRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemeController extends AbstractController
{
    #[Route('/theme', name: 'app_theme')]
    public function getTheme(ManagerRegistry $doctrine, EntityManagerInterface $entityManager): Response
    {
        $repo = $entityManager->getRepository('App\Entity\Theme');
        $theme = $repo->findAll();
        return $this->render('theme/index.html.twig', compact('theme'));
    }
}
