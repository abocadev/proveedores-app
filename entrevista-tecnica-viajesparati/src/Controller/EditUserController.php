<?php

namespace App\Controller;

use App\Entity\Provider;
use App\Form\ProviderType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EditUserController extends AbstractController
{
    #[Route('/edit/{id}', name: 'app_edit_user')]
    public function index(ManagerRegistry $doctrine, $id, Request $request): Response
    {
        $em = $doctrine->getManager();
        $provider = $doctrine->getManager()->getRepository(Provider::class)->find($id);
        $form = $this->createForm(ProviderType::class, $provider);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $provider->setDateUpdated(new \DateTime(date('Y-m-d')));
            $em->persist($provider);
            $em->flush();
            $this->addFlash('success', 'Proveedor Modificado');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('edit_user/index.html.twig', [
            'form' => $form->createView(),
            'name' => $provider->getName()
        ]);
    }
}
