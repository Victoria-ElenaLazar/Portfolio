<?php

namespace App\Controller;

use App\Form\ProfileType;
use App\Repository\ProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProfileController extends AbstractController
{
    #[Route('/', name: 'app_profile')]
    public function index(Request           $request,
                          SluggerInterface  $slugger,
                          ProfileRepository $profiles
    ): Response
    {
        $profile = $profiles->getProfileInfo();

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
                $profiles->find(1);
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
