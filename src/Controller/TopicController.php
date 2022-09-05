<?php

namespace App\Controller;



use App\Entity\Topic;
use App\Repository\TopicRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class TopicController extends AbstractController
{
    #[Route('/topic/{theme_id}', name: 'app_topic')]
    public function getTopic(Request $request, ManagerRegistry $doctrine, int $theme_id, EntityManagerInterface $entityManager): Response
    {
        $theme_id = $request->get('theme_id');

        $repo = $entityManager->getRepository(Topic::class);
        $topic = $repo->getTopicByThemeId($theme_id);
        return $this->render('topic/index.html.twig', compact('topic'));
    }
}
