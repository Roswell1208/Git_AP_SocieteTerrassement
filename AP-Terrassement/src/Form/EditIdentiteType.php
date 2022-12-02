<?php

namespace App\Form;

use App\Entity\Identite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditIdentiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomSiteWeb')
            ->add('adresse')
            ->add('proprietaire')
            ->add('responsablePublication')
            ->add('conceptionRealisation')
            ->add('animation')
            ->add('hebergement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Identite::class,
        ]);
    }
}
