<?php

namespace App\Form\Compose;

use App\Entity\Compose\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('body')
            ->add('circulationDate')
            ->add('mileage')
            ->add('price')
            ->add('reference')
            ->add('hasFiveDoors')
            ->add('hasMechanicalGearbox')
            ->add('CO2emission')
            ->add('seatNbr')
            ->add('speedNbr')
            ->add('consumptionL100')
            ->add('isLeatherUpholstery')
            ->add('displacement')
            ->add('dinPower')
            ->add('fiscalPower')
            ->add('maxSpeed')
            ->add('acceleration')
            ->add('fuel')
            ->add('color')
            ->add('car')
            ->add('critAir')
            ->add('options')
            ->add('garage')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
