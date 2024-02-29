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
    public function index(Request $request,
                          SluggerInterface $slugger,
                          Profile $profile,
                          ProfileRepository $profileRepository,
                          Projects $project,
                          ProjectsRepository $projects): Response
    {
//        $profileRepository->findBy(['name' => 'Victoria-Elena Lazar']);
//        $profileRepository->getProfileInfo();
//        $image = $profile->getImage();
        $profile = $project->getProfile();

        $form = $this->createForm(ProjectsType::class);

        if ($form->isSubmitted() && $form->isValid()){
            $projectVideo = $form->get('video')->getData();
            if ($projectVideo){
                $originalFileName = pathinfo($projectVideo->GetClientOriginalName(), PATHINFO_FILENAME);
                $safeFileName = $slugger->slug($originalFileName);
                $newFileName = $safeFileName . '-' . uniqid() . '.' . $projectVideo->guessExtension();
            }
            try {
                $projectVideo->move($this->getParameter('videos_directory'), $newFileName);
            }catch (FileException $exception){
                echo "Failed to upload your video: " . $exception->getMessage();
            }
            $project->setVideo($newFileName);
            $projects->add($project, true);
            $this->addFlash('success', 'Your profile image was updated.');
            return $this->redirectToRoute('app_projects');

        }

        $form->handleRequest($request);
        return $this->render('projects/index.html.twig', [
            'form' => $form->createView(),
            'project' => $projects->find(5),
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
