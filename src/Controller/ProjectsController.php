<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Entity\Projects;
use App\Form\ProjectsType;
use App\Repository\ProfileRepository;
use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

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
