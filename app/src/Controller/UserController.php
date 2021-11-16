<?php

namespace App\Controller;

use App\Form\EditProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/profile/edit", name="app_edit_profile")
     */
    public function editProfile(): Response
    {
        $form = $this->createForm(EditProfileType::class, $this->getUser());

        return $this->render('user/edit_profile.html.twig', [
            'form' => $form->createView()
        ]);
    }
}