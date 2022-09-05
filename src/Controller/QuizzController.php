<?php

namespace App\Controller;


use App\Entity\Quizz;
use App\Repository\QuizzRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class QuizzController extends AbstractController
{
    #[Route('/quizz/{topic_id}', name: 'app_quizz')]
    public function getQuizz(Request $request, ManagerRegistry $doctrine, int $topic_id, EntityManagerInterface $entityManager): Response
    {
        $topic_id = $request->get('topic_id');

        $repo = $entityManager->getRepository(Quizz::class);
        $quizz = $repo->getQuizzByTopicId($topic_id);
        return $this->render('quizz/index.html.twig', compact('quizz'));
    }
}
