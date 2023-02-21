<?php

namespace App\Form;

use App\Entity\Provider;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class ProviderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nombre del proveedor:',
                'attr' => [
                    'placeholder' => 'Nombre',
                    'class' => 'input-group-text w-100 text-start mt-2 form-control'
                ],
                'row_attr' => [
                    'class' => 'navbar-text form-group'
                ]
            ])
            ->add('tel', TextType::class, [
                'label' => 'Numero de telefono:',
                'attr' => [
                    'placeholder' => '+34 012345678',
                    'class' => 'input-group-text w-100 text-start mt-2'
                ],
                'row_attr' => [
                    'class' => 'navbar-text mt-2'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email del proveedor:',
                'attr' => [
                    'placeholder' => 'correo@dominio.com',
                    'class' => 'input-group-text w-100 text-start mt-2'
                ],
                'row_attr' => [
                    'class' => 'navbar-text mt-2'
                ]
            ])
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'label' => 'Seleccionar tipo de proveedor:',
                'choice_label' => 'name',
                'attr' => [
                    'class' => 'input-group-text w-100 text-start mt-2'
                ]
            ])
            ->add('active', CheckboxType::class, [
                'required' => false,
                'row_attr' => [
                    'class' => 'navbar-text'
                ],
                'attr' => [
                    'class' => 'navbar-text'
                ],
                'label' => 'Proveedor Activo',
                'label_attr' => [
                    'class' => 'p-2'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enviar',
                'attr' => [
                    'class' => 'btn btn-success d-flex mt-2 mx-auto shadow'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Provider::class,
        ]);
    }
}
