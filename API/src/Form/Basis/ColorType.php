<?php

namespace App\Form\Basis;

use App\Entity\Basis\Color;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ColorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('color', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champs ne peut être vide !',
                    ]),
                ],
                'help' => 'Entrez une couleur de carrosserie qui n\'existe pas dans la BDD',
            ])
            ->add('paintType', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champs ne peut être vide !',
                    ]),
                ],
                'help' => 'Entrez le type de la peinture (métallisé, mate, etc.)',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Color::class,
        ]);
    }
}
