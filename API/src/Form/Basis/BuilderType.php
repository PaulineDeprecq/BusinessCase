<?php

namespace App\Form\Basis;

use App\Entity\Basis\Builder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class BuilderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champs ne peut être vide !',
                    ]),
                ],
                'help' => 'Entrez un constructeur que vous connaissez et qui n\'existe pas dans la BDD',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Builder::class,
        ]);
    }
}
