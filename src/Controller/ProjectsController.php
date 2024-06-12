<?php

namespace App\Controller;

use App\Entity\Projects;
use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractController
{
    #[Route('/portfolio', name: 'app_projects')]
    public function index(Projects $projects,
                          ProjectsRepository $project): Response
    {
        $profile = $projects->getProfile();
        return $this->render('projects/index.html.twig', [
            'project' => $project->findAll(),
            'profile' => $profile,

        ]);
    }
    #[Route('/portfolio/{project}', name: 'app_projects_show')]
    public function show(Projects $project): Response
    {
        return $this->render(
            'projects/show.html.twig', [
                'project' => $project,
            ]
        );


    }
}
