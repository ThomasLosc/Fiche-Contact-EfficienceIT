<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\CompanyDepartment;
use App\Entity\Contact;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class,[
                'label' => 'Prénom :',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'form-label fw-bold mt-3',
                ]
            ])
            ->add('lastName', TextType::class,[
                'label' => 'Nom :',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'form-label fw-bold mt-3',
                ]
            ])
            ->add('email', TextType::class,[
                'label' => 'Email :',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'form-label fw-bold mt-3',
                ]
            ])
            ->add('message', TextareaType::class,[
                'label' => 'Message :',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'form-label fw-bold mt-3',
                ]
            ])
            ->add('department', EntityType::class, [
                'label' => 'Département :',
                'class' => CompanyDepartment::class,
                'required' => true,
                'placeholder' => 'Sélectionnez un département',
                'attr' => [
                    'class' => 'form-select mt-2',
                ],
                'label_attr' => [
                    'class' => 'form-label fw-bold mt-3',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
