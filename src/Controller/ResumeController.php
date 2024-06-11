<?php
declare(strict_types=1);
namespace App\Controller;


use App\Entity\Resume;
use App\Repository\ResumeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class ResumeController extends AbstractController
{
    #[Route('/resume', name: 'app_resume')]
    public function index(Resume $resume, ResumeRepository $resumeRepository): Response
    {
        $resume = $resumeRepository->find(1);

        return $this->render('resume/index.html.twig', [
            'resume' => $resume,
        ]);
    }
    #[Route('resume/download', name: 'app_resume_download')]
    public function downloadCV(): BinaryFileResponse
    {
        $filePath = $this->getParameter('kernel.project_dir') . '/public/resume/Resume_VictoriaLazar_2024.pdf';

        $response = new BinaryFileResponse($filePath);
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'Resume_VictoriaLazar_2024.pdf'
        );

        return $response;
    }
}
