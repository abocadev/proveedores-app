<?php

namespace App\Controller;

use App\Entity\Provider;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class VinyilController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function homepage(ManagerRegistry $doctrine): Response {
        $providers = $doctrine->getManager()->getRepository(Provider::class)->findAll();
        return $this->render('home.html.twig', ['providers' => $providers]);
    }
}