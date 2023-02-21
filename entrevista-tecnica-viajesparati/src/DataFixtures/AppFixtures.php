<?php

namespace App\DataFixtures;

use App\Entity\Provider;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $type = new Type();
        $type->setName('Hotel');
        $manager->persist($type);
        $manager->flush();

        $type = new Type();
        $type->setName('Pista');
        $manager->persist($type);
        $manager->flush();

        $type = new Type();
        $type->setName('Complemento');
        $manager->persist($type);
        $manager->flush();

        $dateString = date('Y-m-d');
        $date = new \DateTime($dateString);

        $provider = new Provider();
        $provider->setName('Proveedor 1');
        $provider->setEmail('proveedor1@dominio.com');
        $provider->setTel('+608230454');
        $type = $manager->getRepository(Type::class)->find(1);
        $provider->setType($type);
        $provider->setActive(0);
        $provider->setDateCreated($date);
        $provider->setDateUpdated($date);

        $manager->persist($provider);
        $manager->flush();

        $provider = new Provider();
        $provider->setName('Proveedor 2');
        $provider->setEmail('proveedor2@dominio.com');
        $provider->setTel('+608230454');

        $type = $manager->getRepository(Type::class)->find(2);
        $provider->setType($type);
        $provider->setActive(0);
        $provider->setDateCreated($date);
        $provider->setDateUpdated($date);

        $manager->persist($provider);
        $manager->flush();

        $provider = new Provider();
        $provider->setName('Proveedor 3');
        $provider->setEmail('proveedor3@dominio.com');
        $provider->setTel('+608230454');
        $type = $manager->getRepository(Type::class)->find(3);
        $provider->setType($type);
        $provider->setActive(1);
        $provider->setDateCreated($date);
        $provider->setDateUpdated($date);

        $manager->persist($provider);
        $manager->flush();

        $provider = new Provider();
        $provider->setName('Albert Bocanegra');
        $provider->setEmail('albert.bocanegra2003@gmail.com');
        $provider->setTel('+34 608230454');
        $type = $manager->getRepository(Type::class)->find(3);
        $provider->setType($type);
        $provider->setActive(1);
        $provider->setDateCreated($date);
        $provider->setDateUpdated($date);

        $manager->persist($provider);
        $manager->flush();
    }
}
