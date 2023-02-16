<?php

namespace App\Controller;

use App\Entity\Provider;
use App\Entity\Type;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EditUserController extends AbstractController
{
    #[Route('/edit/{id}', name: 'app_edit_user', methods: 'GET')]
    public function index(ManagerRegistry $doctrine, $id): Response
    {
        $provider = $doctrine->getManager()->getRepository(Provider::class)->find($id);
        $type = $doctrine->getManager()->getRepository(Type::class)->findAll();
        return $this->render('edit_user/index.html.twig', [
            'controller_name' => 'EditUserController',
            'provider' => $provider,
            'types' => $type
        ]);
    }

    #[Route('/edit/{id}', name: 'post_edit_user', methods: 'POST')]
    public function changes(ManagerRegistry $doctrine, Request $request, $id):Response
    {
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $tel = $request->request->get('tel');
        $typeID = $request->request->get('type');
        $activate = $request->request->get('active');
        $activate = $activate == 'check' ? 1 : 0;

        if(!$this->validationLen($name))
        {
            $this->addFlash('error', 'El nombre tiene que tener entre 4 y 100 caracteres');
            return $this->redirectToRoute('app_edit_user', [
                'id' => $id
            ]);
        }

        if(!$this->validationTel($tel)){
            $this->addFlash('error','El numero de telefono solo puede contener numeros.');
            return $this->redirectToRoute('app_edit_user', [
                'id' => $id
            ]);
        }

        if(!$this->validationLen($email))
        {
            $this->addFlash( 'error', 'El correo tiene que tener entre 4 y 100 caracteres');
            return $this->redirectToRoute('app_edit_user', [
                'id' => $id
            ]);
        }

        if(!$this->validationEmail($email))
        {
            $this->addFlash(
                'error',
                'El correo tiene que tener la siguiente estructura: usuario@dominio.com'
            );
            return $this->redirectToRoute('app_edit_user', [
                'id' => $id
            ]);
        }



        $provider = $doctrine->getManager()->getRepository(Provider::class)->find($id);
        $provider->setName($name);
        $provider->setEmail($email);
        $provider->setTel($tel);
        $type = $doctrine->getManager()->getRepository(Type::class)->find($typeID);
        $provider->setType($type);
        $provider->setActive($activate);
        $dateString = date('Y-m-d');
        $date = new \DateTime($dateString);
        $provider->setDateUpdated($date);
        $doctrine->getManager()->flush();

        $this->addFlash(
            'success',
            'Se ha modificado correctamente el proveedor'
        );
        return $this->redirectToRoute('app_home');
    }

    public function validationLen(String $string)
    {
        if(strlen($string) > 4 && strlen($string) < 100)
        {
            return true;
        }
        return false;
    }

    public function validationEmail(String $email)
    {
        for($i = 0; $i < strlen($email); $i++){
            $char = $email[$i];
            if($char == '@'){
                return true;
            }
        }
        return false;
    }

    public function validationTel(String $tel)
    {
        for($i = 0; $i < strlen($tel); $i++ )
        {
            if( $tel[$i] != '0' &&
                $tel[$i] != '1' &&
                $tel[$i] != '2' &&
                $tel[$i] != '3' &&
                $tel[$i] != '4' &&
                $tel[$i] != '5' &&
                $tel[$i] != '6' &&
                $tel[$i] != '7' &&
                $tel[$i] != '8' &&
                $tel[$i] != '9' &&
                $tel[$i] != '+'){
                return false;
            }
        }
        return true;
    }
}
