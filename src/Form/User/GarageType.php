<?php

namespace App\Form\User;

use App\Entity\User\Garage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GarageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('phoneNumber')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('address')
            ->add('professional')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Garage::class,
        ]);
    }
}
