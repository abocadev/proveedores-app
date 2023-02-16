<?php

namespace App\Controller;

use App\Entity\Provider;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteProviderController extends AbstractController
{
    #[Route('/delete/{id}', name: 'delete_provider', methods: 'DELETE')]
    public function delete(ManagerRegistry $doctrine, $id):Response
    {
        $entityManager = $doctrine->getManager();
        $providerRepository = $entityManager->getRepository(Provider::class);
        $provider = $providerRepository->find($id);

        if (!$provider) {
            $this->addFlash(
                'status',
                'No se encontró un proveedor con id:'
            );

            return $this->redirectToRoute('app_home');
        }
        $entityManager->remove($provider);
        $entityManager->flush();

        $this->addFlash(
            'status',
            'Se ha borrado correctamente el registro'
        );
        return $this->redirectToRoute('app_home');
    }
}
