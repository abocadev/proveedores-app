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
        $em = $doctrine->getManager();
        $providerRepository = $em->getRepository(Provider::class);
        $provider = $providerRepository->find($id);

        if (!$provider) {
            $this->addFlash('danger', 'No se encontró un proveedor con id:');
            return $this->redirectToRoute('app_home');
        }
        $em->remove($provider);
        $em->flush();

        $this->addFlash('danger','Se ha borrado correctamente el registro');
        return $this->redirectToRoute('app_home');
    }
}
