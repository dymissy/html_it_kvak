<?php

namespace App\Controller;

use App\Form\EditProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/profile/edit", name="app_edit_profile")
     */
    public function editProfile(Request $request): Response
    {
        $form = $this->createForm(EditProfileType::class, $this->getUser());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', "Profile has been success fully updated!");

            return $this->redirectToRoute('index');
        }

        return $this->render('user/edit_profile.html.twig', [
            'form' => $form->createView()
        ]);
    }
}