<?php

namespace App\Controller;


use App\Repository\ProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(ProfileRepository $profileRepository): Response
    {
        $contact = $profileRepository->getProfileInfo();

        return $this->render('contact/index.html.twig', [
            'contact' => $contact,
        ]);
    }
}
