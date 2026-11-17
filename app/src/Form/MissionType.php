<?php

namespace App\Form;

use App\Entity\Mission;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('destination')
            ->add('objectif')
            ->add('dureeJours')
            ->add('equipage')
            ->add('status')
            ->add('description')
            ->add('typeMission')
            ->add('dateLancementPrevue', null, [
                'widget' => 'single_text'
            ])
           
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mission::class,
        ]);
    }
}
