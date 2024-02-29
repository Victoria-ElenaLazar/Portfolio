<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\ProfileType;
use App\Repository\ProfileRepository;
use App\Repository\ResumeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(Request           $request,
                          SluggerInterface  $slugger,
                          ProfileRepository $profiles,
    ResumeRepository $resume): Response
    {
        $profile = $profiles->getProfileInfo();
        $resume->find(1);

        $form = $this->createForm(ProfileType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profileImageFile = $form->get('profileImage')->getData();
            if ($profileImageFile) {
                $originalFileName = pathinfo(
                    $profileImageFile->getClientOriginalName(),
                    PATHINFO_FILENAME
                );
                $safeFilename = $slugger->slug($originalFileName);
                $newFileName = $safeFilename . '-' . uniqid() . '.' . $profileImageFile->guessExtension();
                try {
                    $profileImageFile->move(
                        $this->getParameter('profiles_directory'),
                        $newFileName
                    );
                } catch (FileException $exception) {
                    echo 'Failed to upload your profile picture: ' . $exception->getMessage();
                }
                $profiles->find(2);
                $profile->setImage($newFileName);
                $profiles->add($profile, true);
                $this->addFlash('success', 'Your profile image was updated.');
                return $this->redirectToRoute('app_profile');

            }
        }
        return $this->render(
            'profile/index.html.twig',
            [
                'form' => $form->createView(),
                'profile' => $profile,
                ]
        );
    }

}
