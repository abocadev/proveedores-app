<?php

namespace App\Controller;

use App\Entity\Provider;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class VinyilController extends AbstractController
{

    #[Route('/', name: 'app_home')]
    public function homepage(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $providerRepository = $entityManager->getRepository(Provider::class);
        $providers = $providerRepository->findAll();
        return $this->render('home.html.twig', [
            'providers' => $providers
        ]);
    }

}