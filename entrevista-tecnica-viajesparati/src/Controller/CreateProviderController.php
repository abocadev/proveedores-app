<?php

namespace App\Controller;

use App\Entity\Provider;
use App\Form\ProviderType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreateProviderController extends AbstractController
{
    #[Route('/create-provider', name: 'app_create_provider')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $em = $doctrine->getManager();
        $provider = new Provider();
        $form = $this->createForm(ProviderType::class, $provider);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $provider->setDateCreated(new \DateTime(date('Y-m-d')));
            $provider->setDateUpdated(new \DateTime(date('Y-m-d')));
            $em->persist($provider);
            $em->flush();
            $this->addFlash('success', 'Proveedor Modificado');
            return $this->redirectToRoute('app_home');
        }
        return $this->render('create_provider/index.html.twig', ['form' => $form->createView()]);
    }
}
