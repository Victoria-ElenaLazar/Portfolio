<?php

namespace App\Controller;

use App\Entity\Recommendations;
use App\Repository\RecommendationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecommendationsController extends AbstractController
{
    #[Route('/recommendations', name: 'app_recommendations')]
    public function index(Recommendations $recommendation, RecommendationsRepository $recommendations): Response
    {
        $profile = $recommendation->getProfile();

        return $this->render('recommendations/index.html.twig', [
            'profile' => $profile,
            'recommendations' => $recommendations->findAll(),
        ]);
    }
}
